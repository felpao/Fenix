<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Fornecedor extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'endereco',
        'fone',
        'email',
        'descricao',



    ];



}
