<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

use App\Models\Insumo;

class Saidainsumos extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'saida_insumos';

    protected $fillable = [
        'desc_pedido',
        'data_pedido',
        'quantidade',
        'insumo_id',
    ];
    public function insumo(){
        return $this->belongsTo(Insumo::class,'insumo_id','id');
    }



}
