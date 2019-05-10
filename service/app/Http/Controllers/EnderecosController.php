<?php

namespace App\Http\Controllers;

use App\Libraries\ErrorResponse;
use App\Models\Enderecos;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnderecosController extends Controller
{
    private $validateField = [
        'idPessoa' => 'required|integer',
        'cep' => 'required',
        'rua' => 'required',
        'complemento' => 'string',
        'numero' => 'required|integer',
        'estado' => 'required',
        'pais' => 'required'
    ];

    public function exibirTodos(int $id): JsonResponse
    {
        return response()->json(Enderecos::where("idPessoa",$id)->get());
    }

    public function exibirUm(int $id,int $idEndereco): JsonResponse
    {
        return response()->json(Enderecos::find($idEndereco));
    }

    public function criar(Request $request, int $id): JsonResponse
    {
        $request->request->add(['idPessoa' => $id]);

        $this->validate($request, $this->validateField);

        $data = Enderecos::create($request->all());

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function editar(Request $request, int $id, int $idEndereco): JsonResponse
    {
        $request->request->add(['idPessoa' => $id]);
        if ($request->isMethod('put')) {
            $this->validate($request, $this->validateField);
        }

        $data = null;
        $status = Response::HTTP_OK;

        try {
            $data = Enderecos::findOrFail($idEndereco);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = (new ErrorResponse("Endereço Not Found", $status))->toArray();
        }

        return response()->json($data, $status);
    }

    public function deletar(int $id,int $idEndereco): JsonResponse
    {
        $data = null;
        $status = Response::HTTP_NO_CONTENT;

        try {
            Enderecos::findOrFail($idEndereco)->delete();
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = (new ErrorResponse("Endereço Not Found", $status))->toArray();
        }

        return response()->json($data, $status);
    }
}
