<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'restaurante_id',
        'repartidor_id',
        'precio',
        'llegada_estimada',
        'validado',
        
    ];
    
     public function user(){

        return $this->belongsTo(User::class, 'user_id');

    }
     public function restaurante(){

        return $this->belongsTo(Restaurante::class, 'restaurante_id');

    }
     public function repartidor(){

        return $this->belongsTo(User::class, 'repartidor_id');

    }
    
    public function lineas(){
        return $this->hasMany(LineaPedido::class);
    }
    
}
