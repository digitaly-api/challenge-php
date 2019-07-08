<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use App\Address;

class AddressController extends Controller
{   
    public function store(Request $request)
    {   
        if (!isset($request->idPerson) || $request->idPerson == '')
            return response()->json(['error' => 'idPerson is missing.'], 400);

        if (!People::find($request->idPerson))
            return response()->json(['error' => 'Person not found.'], 404);    

    	if (!isset($request->postalCode) || $request->postalCode == '')
    		return response()->json(['error' => 'postalCode is missing.'], 400);

    	if (!isset($request->address) || $request->address == '')
    		return response()->json(['error' => 'address is missing.'], 400);

    	if (!isset($request->number) || $request->number == '')
    		return response()->json(['error' => 'number is missing.'], 400);

        if (!isset($request->state) || $request->state == '')
            return response()->json(['error' => 'state is missing.'], 400);

        if (!isset($request->country) || $request->country == '')
            return response()->json(['error' => 'country is missing.'], 400);

    	$address 			  = new Address;
    	$address->id_person   = $request->idPerson;
        $address->postal_code = $request->postalCode;
        $address->address     = $request->address;
        $address->number      = $request->number;
        $address->complement  = isset($request->complement) ? $request->complement : null;
        $address->state       = $request->state;
        $address->country     = $request->country;

    	try {
    		$address->save();

    		return response()->json(['id'         => $address->id, 
    	                             'idPerson'   => $address->id_person,
                                     'postalCode' => $address->postal_code,
                                     'address'    => $address->address,
                                     'number'     => $address->number,
                                     'complement' => $address->complement,
                                     'state'      => $address->state,
                                     'country'    => $address->country], 200);
    	}  catch (Exception $e) {
		    return response()->json(['error' => 'Internal Server Error.'], 500);
		}
    }

    public function update(Request $request, $id) 
    {
        $address = Address::find($id);

        if (!$address)
            return response()->json(['error' => 'Address not found.'], 404);

        if (isset($request->postalCode) && $request->postalCode != '')
             $address->postal_code = $request->postalCode;

        if (isset($request->address) && $request->address != '')
             $address->address = $request->address;

        if (isset($request->number) && $request->number != '')
            $address->number = $request->number;

        if (isset($request->complement))
            $address->complement = $request->complement;

        if (isset($request->state) && $request->state != '')
            $address->state = $request->state;

        if (isset($request->country) && $request->country != '')
            $address->country = $request->country;

        try {
            $address->save();

            return response()->json(['id'         => $id, 
                                     'postalCode' => $address->postal_code,
                                     'address'    => $address->address,
                                     'number'     => $address->number,
                                     'complement' => $address->complement,
                                     'state'      => $address->state,
                                     'country'    => $address->country], 200);
        }  catch (Exception $e) {
            return response()->json(['error' => 'Internal Server Error.'], 500);
        }

    }

    public function destroy($id) 
    {
        $address = Address::find($id);

        if (!$address)
            return response()->json(['error' => 'Address not found.'], 404);

        try {
            $address->delete();

            return response()->json([], 200);
        }  catch (Exception $e) {
            return response()->json(['error' => 'Internal Server Error.'], 500);
        }

    }
}
