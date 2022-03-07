<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class LineaPedido extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'plato_id',
        'pedido_id',
        'precio',
        'cantidad',
        'anotaciones',
    ];
     public function plato(){

        return $this->belongsTo(Plato::class, 'plato_id');

    }
     public function pedido(){

        return $this->belongsTo(Pedido::class, 'pedido_id');

    }
}
