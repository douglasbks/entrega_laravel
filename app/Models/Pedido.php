<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_pedido';

    protected $fillable = [
        'descricao',
        'valor',
        'valor_frete',
        'codigo',
        'data_entrega',
        'id_cliente',
    ];

    public $timestamps = true;

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';
    const DELETED_AT = 'data_exclusao';
}
