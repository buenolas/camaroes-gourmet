<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['titulo', 'preco', 'descricao', 'imagem_url', 'disponivel'];
}
