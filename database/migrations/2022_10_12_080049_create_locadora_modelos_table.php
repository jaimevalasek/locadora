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
        Schema::create('locadora_modelos', function (Blueprint $table) {
            $table->index(['locadora_id', 'modelo_id']);
            $table->foreignId('locadora_id')
                ->constrained('locadoras')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('modelo_id')
                ->constrained('modelos')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locadora_modelos');
    }
};
