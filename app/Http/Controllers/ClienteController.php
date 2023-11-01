<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cliente;

class ClienteController extends BaseController
{

    public function store(Request $request) {

        try {
            $cliente = new Cliente;
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->telefone = $request->input('telefone');
            $cliente->save();
    
            return response()->json(['message' => 'cliente criado com sucesso', 'cliente' => $cliente], 201);
        } catch(Exception $e) {
            return response()->json(['message' => 'Erro ao criar cliente', 'cliente' => $cliente], 500);
        }
        
    }

}
