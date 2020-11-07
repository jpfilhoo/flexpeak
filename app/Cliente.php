<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
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

    public function receitas()
    {
        return $this->hasMany(Receita::class);
    }
}
