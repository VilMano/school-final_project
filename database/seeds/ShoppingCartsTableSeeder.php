<?php

use Illuminate\Database\Seeder;
use App\shoppingCart;

class ShoppingCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shoppingCart = new shoppingCart();
        $shoppingCart->id = 1;
        $shoppingCart->course_id = 1;
        $shoppingCart->user_id = 1;
        $shoppingCart->save();

        $shoppingCart2 = new shoppingCart();
        $shoppingCart2->id = 2;
        $shoppingCart2->course_id = 2;
        $shoppingCart2->user_id = 1;
        $shoppingCart2->save();

        $shoppingCart3 = new shoppingCart();
        $shoppingCart3->id = 3;
        $shoppingCart3->course_id = 3;
        $shoppingCart3->user_id = 1;
        $shoppingCart3->save();

        $shoppingCart4 = new shoppingCart();
        $shoppingCart4->id = 4;
        $shoppingCart4->course_id = 5;
        $shoppingCart4->user_id = 2;
        $shoppingCart4->save();

        $shoppingCart5 = new shoppingCart();
        $shoppingCart5->id = 5;
        $shoppingCart5->course_id = 10;
        $shoppingCart5->user_id = 2;
        $shoppingCart5->save();

        $shoppingCart6 = new shoppingCart();
        $shoppingCart6->id = 6;
        $shoppingCart6->course_id = 3;
        $shoppingCart6->user_id = 3;
        $shoppingCart6->save();
    }
}
