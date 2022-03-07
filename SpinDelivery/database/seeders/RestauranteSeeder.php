<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restaurante;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Restaurante)->create([
            'user_id' => 1,
            'nombre' => 'Pizzellini',
            'descripcion' => '¡Las pizzas más sabrosas de toda Granada!',
            'direccion' => 'C. Gran Vía de Colón, 43',
        ]);
    }
}
