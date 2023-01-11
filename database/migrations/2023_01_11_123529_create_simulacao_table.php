<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacao', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('faculdades_id');
            $table->string('modalidade');
            $table->string('estado');
            $table->float('matematica');
            $table->float('humanas');
            $table->float('natureza');
            $table->float('linguagens');
            $table->float('redacao');
            $table->float('nota_corte');
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
        Schema::dropIfExists('simulacao');
    }
};
