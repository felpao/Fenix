<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Usuario extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'email',

    ];



}
