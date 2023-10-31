<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pedido;
use App\Models\Cliente;

class RelatorioController extends BaseController
{
    public function index() {
        $dados = Pedido::select([
            'tbl_pedido.descricao as descricao',
            'tbl_pedido.codigo as codigo',
            'tbl_pedido.valor as valor',
            'tbl_pedido.valor_frete as valor_frete',
            'tbl_pedido.data_criacao as data_criacao',
            'tbl_pedido.data_entrega as data_entrega',
            'tbl_cliente.nome as nome',
        ])
        ->join('tbl_cliente', 'tbl_pedido.id_cliente', '=', 'tbl_cliente.id')
        ->get()
        ->toArray();

        $clientes = Cliente::get()->toArray();

        return view('dashboard')
        ->with('dados', $dados)
        ->with('clientes', $clientes);
    }
    

    function data() {
        
    }

}
