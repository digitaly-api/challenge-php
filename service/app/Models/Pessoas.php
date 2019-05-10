<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pessoas extends Model
{
    protected $table = 'pessoas';
    protected $fillable = ['nome', 'sobrenome', 'dataNascimento'];
    protected $hidden = ['created_at', 'updated_at'];

    public function getEndereco(): HasMany
    {
        return $this->hasMany('App\Models\Enderecos', 'idPessoa', 'id');
    }

    public function toArray(): array
    {
        $endereco = $this->getEndereco()->getResults();

        return array_merge(parent::toArray(), [
            'enderecos' => count($endereco) > 0 ? $endereco : null
        ]);
    }
}
