<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Compras extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'compras';

    protected $fillable = [
        'nome',
        'data_compra',
        'uni_unitaria',
        'quantidade',
        'valor',



    ];



}
