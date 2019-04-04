<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorFormatResponse;
use App\Models\Address;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    const VALIDATE_FIELDS = [
        'idPerson' => 'required|integer',
        'postalCode' => 'required',
        'address' => 'required',
        'number' => 'required|integer',
        'complement' => 'required',
        'state' => 'required',
        'country' => 'required'
    ];

    public function showAll(): JsonResponse
    {
        return response()->json(Address::all());
    }

    public function showOne($id): JsonResponse
    {
        return response()->json(Address::find($id));
    }

    public function create(Request $request): JsonResponse
    {
        $this->validate($request, self::VALIDATE_FIELDS);

        $data = Address::create($request->all());

        return response()->json($data, 201);
    }

    public function update($id, Request $request): JsonResponse
    {
        $this->validate($request, self::VALIDATE_FIELDS);

        return $this->updateField($id, $request);
    }

    public function updateField($id, Request $request): JsonResponse
    {
        $data = null;
        $status = Response::HTTP_OK;

        try {
            $data = Address::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = ErrorFormatResponse::create("Address Not Found", $status)->toArray();
        }

        return response()->json($data, $status);
    }

    public function delete($id): JsonResponse
    {
        $data = null;
        $status = Response::HTTP_OK;

        try {
            Address::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = ErrorFormatResponse::create("Address Not Found", $status)->toArray();
        }

        return response()->json($data, $status);
    }
}
