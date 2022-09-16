<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id('cotizacionID');
            $table->string('codigoCotizacion', 100)->unique();   
            $table->boolean('exonerado');
            $table->dateTime('fecha');
            $table->boolean('aprobado');
            $table->double('compraDolar', 6,2);
            $table->double('ventaDolar', 6,2);
            $table->string('notas', 2500);
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
        Schema::dropIfExists('cotizacions');
    }
}
