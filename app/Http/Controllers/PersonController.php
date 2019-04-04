<?php

namespace App\Http\Controllers;

use App\Libraries\ErrorFormatResponse;
use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{
    const VALIDATE_FIELDS = [
        'name' => 'required',
        'lastName' => 'required',
        'birthDate' => 'required'
    ];

    public function showAll(): JsonResponse
    {
        return response()->json(Person::all());
    }

    public function showOne($id): JsonResponse
    {
        return response()->json(Person::find($id));
    }

    public function create(Request $request): JsonResponse
    {
        $this->validate($request, self::VALIDATE_FIELDS);

        $data = Person::create($request->all());

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
            $data = Person::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = ErrorFormatResponse::create("Person Not Found", $status)->toArray();
        }

        return response()->json($data, $status);
    }

    public function delete($id): JsonResponse
    {
        $data = null;
        $status = Response::HTTP_OK;

        try {
            Person::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = ErrorFormatResponse::create("Person Not Found", $status)->toArray();
        }

        return response()->json($data, $status);
    }
}
