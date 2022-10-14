<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeiculoLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('veiculo_logs')->insert([
            'modelo' => 'Gol',
            'montadora' => 'Volksvagem',
            'data_inicio' => '2022-10-02 15:33:25',
            'veiculo_id' => 1,
            'locadora_id' => 1
        ]);
    }
}
