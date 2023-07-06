<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Saidaequimapento extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'saida_equipamentos';

    protected $fillable = [
        'data_pedido',
        'equipamento_id',
    ];

    public function equipamento(){
        return $this->belongsTo(Equipamento::class,'equipamento_id','id');
    }

}
