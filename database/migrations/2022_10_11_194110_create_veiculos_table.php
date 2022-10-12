<?php

use App\Models\Modelo;
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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('numero_portas');
            $table->string('cor', 20);
            $table->string('fabricante');
            $table->smallInteger('ano_modelo', );
            $table->smallInteger('ano_fabricacao');
            $table->string('placa', 8)->unique();
            $table->string('chassi', 30)->unique();
            $table->foreignIdFor(Modelo::class)->constrained();
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
        Schema::dropIfExists('veiculos');
    }
};
