<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Plato;
use App\Models\Pedido;

class CreateLineaPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Plato::class);
            $table->foreignIdFor(Pedido::class);
            $table->float('precio');
            $table->integer('cantidad');
            $table->text('anotaciones')->nullable();
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
        Schema::dropIfExists('linea_pedidos');
    }
}
