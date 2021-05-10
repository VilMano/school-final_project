<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'user@email.com';
        $user->password = bcrypt('secret');
        $user->name = 'Guilherme';
        $user->lastname = 'Mano';
        $user->is_admin = false;
        $user->address = 'Rua dos Rissois';
        $user->postal_code = '4200-123';
        $user->city = 'Porto';
        $user->nif = 1234865;
        $user->save();

        $user1 = new User();
        $user1->email = 'admin@email.com';
        $user1->password = bcrypt('secret');
        $user1->name = 'Henrique';
        $user1->lastname = 'Oliveira';
        $user1->is_admin = true;
        $user1->save();

        $user = new User();
        $user->email = 'diogo@email.com';
        $user->password = bcrypt('secret');
        $user->name = 'Diogo';
        $user->lastname = 'Moutinho';
        $user->is_admin = false;
        $user->save();

        $user = new User();
        $user->email = 'teste@email.com';
        $user->password = bcrypt('secret');
        $user->name = 'teste';
        $user->lastname = 'teste';
        $user->is_admin = false;
        $user->save();
    }
}
