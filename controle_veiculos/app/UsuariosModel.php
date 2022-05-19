<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'cpf'];
}
