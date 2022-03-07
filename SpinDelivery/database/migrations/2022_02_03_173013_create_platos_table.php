<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Restaurante;

class CreatePlatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Restaurante::class);
            $table->float('precio');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('ingredientes');
            $table->string('alergenos');
            $table->boolean('es_vegano');
            $table->integer('popularidad')->default(0);
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('platos');
    }
}
