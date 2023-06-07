<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Setor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'setor';

    protected $fillable = [
        'nome',
        'encarregado',
        'fone',

    ];



}
