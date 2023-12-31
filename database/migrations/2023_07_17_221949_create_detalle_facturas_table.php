<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalleFacturas', function (Blueprint $table) {
            $table->id();
            $table->decimal('precio', 10,2);
            $table->decimal('total', 10,2);

            
            $table->bigInteger('producto_id')-> unsigned();
            $table->bigInteger('factura_id')-> unsigned();
             
 
            //relacion mediante las llaves foraneas

            $table->foreign('producto_id')-> references('id')->on('productos')->onDelete('cascade');
            $table->foreign('factura_id')-> references('id')->on('facturas')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleFacturas');
    }
};
