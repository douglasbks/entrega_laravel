<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pedido;

class PedidoController extends BaseController
{

    public function store(Request $request) {

        try {
            $pedido = new Pedido;
            $pedido->descricao = $request->input('descricao');
            $pedido->data_entrega = $request->input('data_entrega');
            $pedido->valor = $request->input('valor');
            $pedido->valor_frete = $request->input('valor_frete');
            $pedido->id_cliente = $request->input('id_cliente');
            $pedido->save();
    
            return response()->json(['message' => 'Pedido criado com sucesso', 'pedido' => $pedido], 201);
        } catch(Exception $e) {
            return response()->json(['message' => 'Erro ao criar pedido', 'pedido' => $pedido], 500);
        }
        
    }

}
