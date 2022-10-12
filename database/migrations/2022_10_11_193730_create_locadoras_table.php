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
        Schema::create('locadoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantasia', 60);
            $table->string('razao_social', 60);
            $table->string('cnpj', 20)->unique();
            $table->string('email', 50);
            $table->string('telefone', 20);
            $table->string('cep', 15);
            $table->string('rua', 60);
            $table->string('numero', 20);
            $table->string('bairro', 30);
            $table->string('cidade', 60);
            $table->string('estado', 30);
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
        Schema::dropIfExists('locadoras');
    }
};
