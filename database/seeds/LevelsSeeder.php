<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = new Level();
        $level->id = 1;
        $level->type = 'Iniciante';
        $level->save();

        $level = new Level();
        $level->id = 2;
        $level->type = 'Intermédio';
        $level->save();

        $level = new Level();
        $level->id = 3;
        $level->type = 'Avançado';
        $level->save();
    }
}
