<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plato;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Plato)->create([
            'restaurante_id' => 1,
            'precio' => 4,
            'nombre' => '4 Quesos',
            'descripcion' => 'Fúndete con los cuatro mejores quesos del mundo en esta sabrosa combinación.',
            'ingredientes' => 'Mozzarella, Grana Padano, Gorgonzola y Parmesano.',
            'alergenos' => 'Proteína de la leche.',
            'es_vegano' => 0,
            'popularidad' => 75
        ]);

        (new Plato)->create([
            'restaurante_id' => 1,
            'precio' => 5,
            'nombre' => 'Barbacoa Cremosa',
            'descripcion' => 'Ponte las botas con nuestra cremosa salsa Bourbon y la mejor carne, desde Italia con amor.',
            'ingredientes' => 'Bacon, ternera, salsa barbacoa y salsa Bourbon.',
            'alergenos' => 'No existen alérgenos en concreto para esta pizza.',
            'es_vegano' => 0,
            'popularidad' => 90
        ]);
    }
}
