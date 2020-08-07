<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role = 'ADMIN';
        $user->name = 'Admin Admin';
        $user->email = 'admin@graphl.com';
        $user->phone = 1234567891;
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'CLIENT';
        $user->name = 'Client Client';
        $user->email = 'client@graphl.com';
        $user->phone = 1234567892;
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'VETERINARIAN';
        $user->name = 'Veterinarian Veterinarian';
        $user->email = 'veterinarian@graphl.com';
        $user->phone = 1234567893;
        $user->password = bcrypt('adminadmin');
        $user->save();

        $user = new User();
        $user->role = 'DRIVER';
        $user->name = 'Driver Driver';
        $user->email = 'driver@graphl.com';
        $user->phone = 1234567894;
        $user->password = bcrypt('adminadmin');
        $user->save();
    }
}
