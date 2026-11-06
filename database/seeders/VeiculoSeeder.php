<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Veiculo;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Veiculo::create([
            'marca_id' => 2,
            'modelo' => 'Corolla 2.0 XE',
            'ano' => '2020',
            'preco' => 55000,
            'status' => 'disponivel',
        ]);

        Veiculo::create([
            'marca_id' => 2,
            'modelo' => 'Corolla 2.0 XE',
            'ano' => '2022',
            'preco' => 60895,
            'status' => 'reservado',
        ]);

         Veiculo::create([
            'marca_id' => 1,
            'modelo' => 'Onix LTZ',
            'ano' => '2014',
            'preco' => 22586,
            'status' => 'vendido',
        ]);
    }
}
