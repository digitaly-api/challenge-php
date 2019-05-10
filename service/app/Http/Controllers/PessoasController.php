<?php

namespace App\Http\Controllers;

use App\Libraries\ErrorResponse;
use App\Models\Pessoas;
use App\Models\Enderecos;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PessoasController extends Controller
{
    private $validateField =  [
        'nome' => 'required',
        'sobrenome' => 'required',
        'dataNascimento' => 'required'
    ];

    public function exibirTodos(): JsonResponse
    {
        return response()->json(Pessoas::all());
    }

    public function exibirUm($id): JsonResponse
    {
        return response()->json(Pessoas::find($id));
    }

    public function criar(Request $request): JsonResponse
    {
        $this->validate($request, $this->validateField);
        $enderecos = $request->only('enderecos');

        $data = Pessoas::create($request->except('enderecos'));

        if (!empty($enderecos)) {
            $idPessoa = $data->id;
            foreach ($enderecos["enderecos"] as $key => $endereco) {
                $endereco['idPessoa'] = $idPessoa;
                Enderecos::create($endereco);
            }
            $data = Pessoas::find($idPessoa);
        }

        return response()->json($data, Response::HTTP_CREATED);
    }

    public function editar($id, Request $request): JsonResponse
    {
        if($request->isMethod('put')) {
            $this->validate($request, $this->validateField);
        }

        $data = null;
        $status = Response::HTTP_OK;

        try {
            $data = Pessoas::findOrFail($id);
            $data->update($request->all());
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = (new ErrorResponse("Pessoa Not Found", $status))->toArray();
        }

        return response()->json($data, $status);
    }

    public function deletar($id): JsonResponse
    {
        $data = null;
        $status = Response::HTTP_NO_CONTENT;

        try {
            Pessoas::findOrFail($id)->delete();
        } catch (ModelNotFoundException $e) {
            $status = Response::HTTP_NOT_FOUND;
            $data = (new ErrorResponse("Pessoa Not Found", $status))->toArray();
        }

        return response()->json($data, $status);
    }
}
