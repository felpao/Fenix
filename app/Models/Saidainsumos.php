<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Saidainsumos extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'saida_insumos';

    protected $fillable = [
        'data_pedido',
        'desc_pedido',
        'insumo_id',


    ];
    public function insumos(){
        return $this->belongsTo(insumos::class,'id');
    }



}
