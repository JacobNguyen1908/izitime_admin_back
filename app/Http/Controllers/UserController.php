<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create super
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function create(Request $request)
    {
        $addressId = null;
        $request->validate([
            'name' => 'required|string',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string|same:password',
            'user_type_id' => 'nullable|integer'
        ]);
        DB::beginTransaction();
        try
        {
            // Create address for this user if not empty
            if ($request->address_line_1 || $request->address_line_2 || $request->zipcode || $request->city || $request->country) {
                $addressController = new AddressController;
                $addressRequest = new Request([
                    'address_line_1' => $request->address_line_1,
                    'address_line_2' => $request->address_line_2,
                    'zipcode' => $request->zipcode,
                    'city' => $request->city,
                    'country' => $request->country
                ]);
                $addressId = ($addressController->create($addressRequest)->getData());
            }

            $dob = $request->dob ? \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.uO', $request->dob) : null;
            $user = new User([
                'name' => $request->name,
                'day_of_birth' => $dob,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_type_id' => $request->user_type_id,
                'address_id' => $addressId === null ? $addressId : $addressId[0]
            ]);
            $user->save();
            $success['token'] =  $user->createToken($request->name)-> accessToken;
            $success['name'] =  $user->name;
            DB::commit();
            return response()->json([
                'success'=>$success,
                'message'=>'User successfully created.'
            ]);
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'details'=>$e->getMessage(),
                'message'=>'Failed to create user'
            ]);
        }
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
            'browser_timezone' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 500);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->tz($request->browser_timezone)->addHours(2);
        $token->save();
        // Log this activity in database
        activity('user login')->causedBy($user->id)->log('User '.$user->id. ' logged in');
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        $user = $request->user();
        // Log this activity in database
        activity('user logout')->causedBy(Auth::user())->log('User '.$user->id. ' logged out');
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $u = $request->user();
        $u->address = $request->user()->address;
        $u->rights = $request->user()->user_type->rights;
        $u->user_rights = $u->getUserRights();

        return response()->json($u);
    }

    /**
     * Get all users
     *
     * @return [json] users
     */
    public function getAll()
    {
        $users = User::with('user_type')->get();
        return response()->json($users);
    }


    /**
     * Get user by id
     *
     * @return [json] user object
     */
    public function getOne($id)
    {
        $user = User::findOrFail($id);
        $user->address = $user->address;
        $user->rights = $user->user_type->rights;

        return response()->json($user);
    }

    /**
     * Check if user are authenticated
     */
    public function checkIfAuthenticated()
    {
        if (Auth::check()) {
            return response()->json([
                'message' => 'User has logged in'
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    /**
     * Delete a user by id
     *
     * @param [integer] id
     */
    public function deleteOne($id) {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            // delete address
            if (isset($user->address_id)) {
                Address::find($user->address_id)->delete();
            }
            // delete user
            $user->delete();
            DB::commit();
            return response()->json([
                'message' => 'User successfully deleted'
            ]);
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'details'=>$e->getMessage(),
                'message'=>'Failed to delete user'
            ], 500);
        }
    }

    /**
     * Update a user
     *
     * @param [integer] id
     */
    public function updateOne($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'dob' => 'nullable|date',
            'phone' => 'nullable|string',
            'email' => 'required|string|email|unique:users,email,'.$id,
            'user_type_id' => 'nullable|integer'
        ]);
        DB::beginTransaction();
        try {
            // Find user by id
            $user = User::findOrFail($id);
            // Create address for this user if not empty
            if ($request->address_line_1 || $request->address_line_2 || $request->zipcode || $request->city || $request->country) {
                // Update address for this user
                $addressController = new AddressController;
                $addressRequest = new Request([
                    'address_line_1' => $request->address_line_1,
                    'address_line_2' => $request->address_line_2,
                    'zipcode' => $request->zipcode,
                    'city' => $request->city,
                    'country' => $request->country
                ]);
                if ($user->address_id) {
                    $addressController->updateOne($user->address_id, $addressRequest);
                } else {
                    $addressId = ($addressController->create($addressRequest)->getData());
                    $user->address_id = $addressId[0];
                }
            }
            // Update user
            $dob = $request->dob ? \Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s.uO', $request->dob) : null;
            $user->name = $request->name;
            $user->day_of_birth = $dob;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->user_type_id = $request->user_type_id;
            $user->save();
            // if user is employee : update associated employee
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'User successfully updated'
            ]);
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'details'=>$e->getMessage(),
                'message'=>'Failed to update user'
            ], 500);
        }
    }

    public function updatePersonal($id, Request $request) {
        if (Auth::id() != $id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 500);
        } else {
            return $this->updateOne($id, $request);
        }
    }

    public function updatePassword($id, Request $request) {
        if (Auth::id() != $id) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 500);
        }
        try {
            // Find user by id
            $user = User::findOrFail($id);

            $request->validate([
                'email' => 'required|string|email',
                'currentPassword' => 'required|string',
                'password' => 'required|string'
            ]);
            if(!Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->currentPassword])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Incorrect password'
                ]);
            } else {
                $user->password = bcrypt($request->password);
                $user->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Password successfully updated'
                ]);
            }
        } catch (Exception $e) {
            \Sentry\captureException($e);
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get notifications of authenticated user
     */
    public function getAllNotifications() {
        $user = Auth::user();
        $notifications = $user->notifications;
        return response()->json($notifications);
    }

    /**
     * Get notifications of authenticated user
     */
    public function getNotifications() {
        $user = Auth::user();
        $notifications = $user->notifications()->paginate(20);
        $unread = collect([
            'unread' => $user->unreadNotifications->count()
        ]);
        $data = $unread->merge($notifications);
        return response()->json($data);
    }

    /**
     * Get unread notifications of authenticated user
     */
    public function getUnreadNotifications() {
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        return response()->json($notifications);
    }

    /**
     * Mark unread notifications as read or delete notifications
     */
    public function updateUserNotification(Request $request) {
        $user = Auth::user();
        $request->validate([
            'readAll' => 'required|boolean'
        ]);
        DB::beginTransaction();
        try {
            $listReadId = $request->read;
            $listDeleteId = $request->delete;
            if ($request->readAll) {
                $user->unreadNotifications->markAsRead();
            } else {
                $user->unreadNotifications->whereIn('id', $listReadId)->markAsRead();
            }
            $user->notifications()->whereIn('id', $listDeleteId)->delete();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Notifications updated',
            ]);
        } catch (Exception $e) {
            \Sentry\captureException($e);
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
