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
        Schema::create('PesoNotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculdade_id')->constrained('faculdade')->onDelete('cascade');
            $table->float('matematica')->default(0.0);
            $table->float('humanas')->default(0.0);
            $table->float('natureza')->default(0.0);
            $table->float('linguagens')->default(0.0);
            $table->float('redacao')->default(0.0);
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
        Schema::dropIfExists('PesoNotas');
    }
};
