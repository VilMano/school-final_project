<?php

use App\Duration;
use Illuminate\Database\Seeder;

class DurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $duration = new Duration();
        $duration->id = 1;
        $duration->number = 3;
        $duration->id_duration_type = 1;
        $duration->save();

        $duration1 = new Duration();
        $duration1->id = 2;
        $duration1->number = 1;
        $duration1->id_duration_type = 2;
        $duration1->save();
    }
}
