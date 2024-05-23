<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActuationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alarms_actuations')->insert(
            [
                [
                    'start' => now()->subHours(3)->subMinutes(30),
                    'end' => now()->subHours(3)->subMinutes(25),
                    'alarm_id' => 1,
                ],
                [
                    'start' => now()->subHours(3)->subMinutes(20),
                    'end' => now()->subHours(3)->subMinutes(15),
                    'alarm_id' => 1,
                ],
                [
                    'start' => now()->subHours(4)->subMinutes(30),
                    'end' => now()->subHours(4)->subMinutes(25),
                    'alarm_id' => 2,
                ],
                [
                    'start' => now()->subHours(4)->subMinutes(20),
                    'end' => now()->subHours(4)->subMinutes(15),
                    'alarm_id' => 2,
                ],
                [
                    'start' => now()->subHours(4)->subMinutes(10),
                    'end' => now()->subHours(4)->subMinutes(5),
                    'alarm_id' => 2,
                ],
                [
                    'start' => now()->subHours(5)->subMinutes(30),
                    'end' => now()->subHours(5)->subMinutes(25),
                    'alarm_id' => 3,
                ],
                [
                    'start' => now()->subHours(5)->subMinutes(20),
                    'end' => now()->subHours(5)->subMinutes(15),
                    'alarm_id' => 3,
                ],
                [
                    'start' => now()->subHours(5)->subMinutes(10),
                    'end' => now()->subHours(5)->subMinutes(5),
                    'alarm_id' => 3,
                ],
                [
                    'start' => now()->subHours(5)->subMinutes(5),
                    'end' => now()->subHours(5)->subMinutes(3),
                    'alarm_id' => 3,
                ],
                [
                    'start' => now()->subHours(5)->subMinutes(2),
                    'end' => now()->subHours(5)->subMinutes(1),
                    'alarm_id' => 3,
                ],
            ]
        );
    }
}
