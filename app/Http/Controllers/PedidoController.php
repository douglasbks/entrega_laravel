<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PedidoController extends BaseController
{

    public function store(Request $request) {
        try {
            $pedido = new Pedido;
            $pedido->descricao = $request->input('descricao');
            $pedido->data_entrega = $request->input('data_entrega');
            $pedido->valor = $request->input('valor');
            $pedido->valor_frete = $request->input('valor_frete');
            $pedido->save();
    
            return response()->json(['message' => 'Pedido criado com sucesso', 'pedido' => $pedido], 201);
        } catch(Exception $e) {
            return response()->json(['message' => 'Erro ao criar pedido', 'pedido' => $pedido], 500);
        }
        
    }

}
