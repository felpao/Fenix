<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use App\Models\Compras;

class Desccompras extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'desc_compras';

    protected $fillable = [
        'desc_ped',
        'compra_id'
    ];
    public function compras(){
        return $this->belongsTo(Compras::class,'id');
    }



}
