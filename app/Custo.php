<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    protected $fillable = [
        'user_id',
        'fornecedor_id',
        'descricao',
        'valor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
