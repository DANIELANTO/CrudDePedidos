<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            // Asegurarse de que 'sucursal' sea un string y pueda almacenar múltiples sucursales
            $table->string('sucursal')->change(); // Cambiar la columna 'sucursal' si ya existe
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos', function (Blueprint $table) {
            // Revertir el cambio si es necesario (opcional)
            $table->text('sucursal')->change(); // Por ejemplo, cambiar de nuevo a otro tipo si fue modificado
        });
    }
}
