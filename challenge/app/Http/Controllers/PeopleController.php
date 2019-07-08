<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class PeopleController extends Controller
{
    public function store(Request $request)
    {
    	if (!isset($request->name) || $request->name == '')
    		return response()->json(['error' => 'name is missing.'], 400);

    	if (!isset($request->lastName) || $request->lastName == '')
    		return response()->json(['error' => 'lastName is missing.'], 400);

    	if (!isset($request->birthDate) || $request->birthDate == '')
    		return response()->json(['error' => 'birthDate is missing.'], 400);

    	$people 			= new People;
    	$people->name 		= $request->name;
    	$people->last_name  = $request->lastName;
    	$people->birth_date = $request->birthDate;

    	try {
    		$people->save();

    		return response()->json(['id' 		 => $people->id, 
    	                             'name'      => $people->name,
    	                             'lastName'  => $people->last_name,
    	                             'birthDate' => $people->birth_date], 200);
    	}  catch (Exception $e) {
		    return response()->json(['error' => 'Internal Server Error.'], 500);
		}
    }

    public function update(Request $request, $id) 
    {
    	$person = People::find($id);

    	if (!$person)
    		return response()->json(['error' => 'Person not found.'], 404);

    	if (isset($request->name) && $request->name != '')
    		$person->name = $request->name;

    	if (isset($request->lastName) && $request->lastName != '')
    		$person->last_name = $request->lastName;

    	if (isset($request->birthDate) && $request->birthDate != '')
    		$person->birth_date = $request->birthDate;

    	try {
    		$person->save();

    		return response()->json(['id' 		 => $id, 
    	                             'name'      => $person->name,
    	                             'lastName'  => $person->last_name,
    	                             'birthDate' => $person->birth_date], 200);
    	}  catch (Exception $e) {
		    return response()->json(['error' => 'Internal Server Error.'], 500);
		}
    }

    public function destroy($id) 
    {
    	$person = People::where('id', $id)->with('addresses')->first();

    	if (!$person)
    		return response()->json(['error' => 'Person not found.'], 404);

		if ($person->addresses->first())
    		return response()->json(['error' => 'Person has one or more address.'], 403);

    	try {
            $person->delete();

            return response()->json([], 200);
        }  catch (Exception $e) {
            return response()->json(['error' => 'Internal Server Error.'], 500);
        }
    }

    public function show($id = null)
    {	
    	if ($id == null)
    		$people = People::with('addresses')->get();
    	else {
    		$people = People::where('id', $id)->with('addresses')->get();

    		if (!$people->first())
    			return response()->json(['error' => 'Person not found.'], 404);
    	}

    	$data = [];

    	foreach ($people as $person) {
    		$p = [];
    		$p['id']        = $person->id;
    		$p['name']      = $person->name;
    		$p['lastName']  = $person->last_name;
    		$p['birthDate'] = $person->birth_date;

    		$key = 0;

    		$p['address'] = [];

    		foreach ($person->addresses as $address) {
    			$p['address'][$key]['id'] 		  = $address->id;
    			$p['address'][$key]['postalCode'] = $address->postal_code;
    			$p['address'][$key]['address']    = $address->address;
    			$p['address'][$key]['number']     = $address->number;
    			$p['address'][$key]['complement'] = $address->complement;
    			$p['address'][$key]['state'] 	  = $address->state;
    			$p['address'][$key]['country']   = $address->country;

    			$key ++;
    		}

    		array_push($data, $p);
    	}

    	return response()->json($data, 200);
    }
}
