<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Create address
     *
     * @param  [string] address_line_1
     * @param  [string] address_line_2
     * @param  [int] zipcode
     * @param  [string] country
     */
    public function create(Request $request)
    {
        $request->validate([
            'address_line_1' => 'required|string'
        ]);
        $address = new Address([
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'zip_code' => $request->zipcode,
            'city' => $request->city,
            'country' => $request->country
        ]);
        $address->save();
        $success =  $address->id;
        return response()->json([$success]);
    }

    /**
     * Get address by id
     *
     * @params [integer] id
     */
    public function getOne($id) {
        $address = Address::findOrFail($id);
        return response()->json($address);
    }

    /**
     * Update address
     *
     * @param  [string] address_line_1
     * @param  [string] address_line_2
     * @param  [int] zipcode
     * @param  [string] country
     */
    public function updateOne($id, Request $request)
    {
        $request->validate([
            'address_line_1' => 'required|string'
        ]);
        $address = Address::findOrFail($id);
        // Compare two addresses
        if ($address->address_line_1 == $request->address_line_1 && $address->address_line_2 == $request->address_line_2
         && $address->zip_code = $request->zipcode && $address->city == $request->city && $address->country == $request->country) {
            return response()->json([
                'same_address' => true
            ]);
        } else {
            $address->address_line_1 = $request->address_line_1;
            $address->address_line_2 = $request->address_line_2;
            $address->zip_code = $request->zipcode;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->save();
            return response()->json([
                'message' => 'Address successfully updated'
            ]);
        }
    }
}
