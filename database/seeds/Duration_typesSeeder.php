<?php

use App\durationType;
use Illuminate\Database\Seeder;

class Duration_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $duration_type = new durationType();
        $duration_type->id = 1;
        $duration_type->type = 'Dia';
        $duration_type->save();

        $duration_type1 = new durationType();
        $duration_type1->id = 2;
        $duration_type1->type = 'Semana';
        $duration_type1->save();

        $duration_type1 = new durationType();
        $duration_type1->id = 3;
        $duration_type1->type = 'Mês';
        $duration_type1->save();
    }
}
