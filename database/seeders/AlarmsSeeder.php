<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlarmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alarms')->insert(
            [
                [
                    'name' => 'Alarme 1',
                    'description' => 'Descrição do alarme 1',
                    'classification' => 'urgent',
                    'deactivated_at' => now(),
                    'equipment_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Alarme 2',
                    'description' => 'Descrição do alarme 2',
                    'classification' => 'emergent',
                    'deactivated_at' => null,
                    'equipment_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Alarme 3',
                    'description' => 'Descrição do alarme 3',
                    'classification' => 'ordinary',
                    'deactivated_at' => null,
                    'equipment_id' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
