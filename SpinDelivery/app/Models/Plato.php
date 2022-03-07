<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Plato extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'restaurante_id',
        'precio',
        'descripcion',
        'ingredientes',
        'alergenos',
        'es_vegano',
        'popularidad',
        'foto',
        
        
    ];
    public function restaurante(){

        return $this->belongsTo(Restaurante::class, 'restaurante_id');

    }

}
