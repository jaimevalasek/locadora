<?php

use App\Models\Veiculo;
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
        Schema::create('veiculo_logs', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', 30);
            $table->string('montadora', 50);
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim')->nullable();
            $table->foreignIdFor(Veiculo::class);
            $table->foreignIdFor(Locadora::class);
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
        Schema::dropIfExists('veiculo_logs');
    }
};
