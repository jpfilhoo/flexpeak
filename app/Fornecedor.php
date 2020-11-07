<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'telefone',
        'cpf',
        'cnpj',
        'tipo',
        'cep',
        'cidade',
        'uf',
        'bairro',
        'rua',
        'numero'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function custos()
    {
        return $this->hasMany(Custo::class);
    }
}
