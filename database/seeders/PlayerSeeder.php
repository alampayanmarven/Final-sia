<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $players = [
            [
                'image'=>'',
                'position'=>'Setter',
                'name'=>'Gabo',
                'jersey_number'=>02
            ],
            [
                'image'=>'',
                'position'=>'Back row',
                'name'=>'Aldrin',
                'jersey_number'=>03
            ],
            [
                'image'=>'',
                'position'=>'Attaker',
                'name'=>'Josh',
                'jersey_number'=>04
            ],
            [
                'image'=>'',
                'position'=>'Side attaker',
                'name'=>'bikal',
                'jersey_number'=>05
            ],
            [
                'image'=>'',
                'position'=>'Setter',
                'name'=>'emman',
                'jersey_number'=>06
            ],
        ];
        foreach ($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}
