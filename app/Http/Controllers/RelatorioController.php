<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Pedido;
use App\Models\Cliente;
use Yajra\DataTables\Facades\DataTables;

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

    public function data(Request $request) {
        $query = Pedido::select([
            'tbl_pedido.descricao as descricao',
            'tbl_pedido.codigo as codigo',
            'tbl_pedido.valor as valor',
            'tbl_pedido.valor_frete as valor_frete',
            'tbl_pedido.data_criacao as data_criacao',
            'tbl_pedido.data_entrega as data_entrega',
            'tbl_cliente.nome as nome',
        ])
        ->join('tbl_cliente', 'tbl_pedido.id_cliente', '=', 'tbl_cliente.id');
    
        if ($request->filled('ano')) {
            $query->whereYear('tbl_pedido.data_criacao', $request->input('ano'));
        }
    
        if ($request->filled('mes')) {
            $query->whereMonth('tbl_pedido.data_criacao', $request->input('mes'));
        }
    
        if ($request->filled('dia')) {
            $query->whereDay('tbl_pedido.data_criacao', $request->input('dia'));
        }
    
        if ($request->filled('cliente')) {
            $query->where('tbl_cliente.nome', $request->input('cliente'));
        }
    
        if ($request->filled('descricao')) {
            $query->where('tbl_pedido.descricao', 'like', '%' . $request->input('descricao') . '%');
        }
    
        if ($request->filled('valor')) {
            $query->where('tbl_pedido.valor', '=', $request->input('valor'));
        }
    
        $pedidosFiltrados = $query->get();
    
        return DataTables::of($pedidosFiltrados)->make(true);
    }

}
