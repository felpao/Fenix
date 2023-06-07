<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Insumo extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'insumos';

    protected $fillable = [
        'nome',
        'descricao',
        'uni_unitaria',
        'quantidade',
        'valor',


    ];



}
