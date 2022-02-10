<?php

namespace App\Http\Controllers\UserType;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    /**
     * Create user type
     *
     * @param  [string] name
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        // Insert user type and get id
        $userType = new UserType([
            'name' => $request->name
        ]);

        $userType->save();

        // Attach user rights
        $userType->rights()->sync(json_decode($request->rights));


        return response()->json([
            'message' => 'User type successfully created',
            'success' => true
        ]);
    }

    /**
     * Get all user type
     *
     */
    public function getAll(Request $request)
    {
        return response()->json(UserType::with('rights')->get());
    }

    /**
     * Get user type by id
     * included also user rights
     *
     * @params [integer] id
     */
    public function getOne($id) {
        $userType = UserType::with('rights')->findOrFail($id);
        return response()->json(
            $userType
        );
    }

    /**
     * Update a user type
     * @param id
     */
    public function updateOne($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $userType = UserType::findOrFail($id);
        $userType->name = $request->name;
        // Attach user rights
        $userType->rights()->sync(json_decode($request->rights));
        $userType->save();

        return response()->json([
            'message' => 'User type successfully updated',
            'success' => true
        ]);
    }

    /**
     * Delete a user type
     * @param id
     */
    public function deleteOne($id)
    {
        // delete user type
        if (+$id !== 1) {
            UserType::find($id)->delete();

            return response()->json([
                'message' => 'User type successfully deleted',
                'success' => true
            ]);
        } else {
            return response()->json([
                'message' => 'User type cannot be deleted',
                'success' => false
            ]);
        }
    }
}
