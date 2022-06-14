<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VeiculosModel extends Model
{
    protected $fillable = ['placa','cor','ano','modelo','marca','proprietario_id'];
}
