<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Restaurante;
use App\Models\Repartidor;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignId('repartidor_id')->nullable();
            $table->foreignIdFor(Restaurante::class);
            $table->float('precio');
            $table->timestamp('llegada_estimada')->nullable();
            $table->boolean('validado')->nullable();
            $table->enum('estado', ['Preparando', 'De camino', 'Entregado' ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
