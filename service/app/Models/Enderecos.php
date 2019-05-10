<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $table = 'enderecos';
    protected $fillable = ['idPessoa', 'cep', 'rua', 'numero', 'complemento', 'estado','pais'];
    protected $hidden = ['created_at', 'updated_at'];
}
