<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'tbl_cliente';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
    ];

    public $timestamps = true;

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_alteracao';
    const DELETED_AT = 'data_exclusao';
}
