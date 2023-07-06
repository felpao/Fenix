<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Equipamento extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'equipamentos';

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
    ];



}
