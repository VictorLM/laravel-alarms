<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipments')->insert(
            [
                [
                    'name' => 'Equipamento 1',
                    'description' => 'Descrição do equipamento 1',
                    'serial_number' => 'teste123',
                    'type' => 'voltage',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Equipamento 2',
                    'description' => 'Descrição do equipamento 2',
                    'serial_number' => 'teste321',
                    'type' => 'current',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Equipamento 3',
                    'description' => 'Descrição do equipamento 3',
                    'serial_number' => 'teste231',
                    'type' => 'oil',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
