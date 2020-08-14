<?php

use App\Model\Animal;
use Illuminate\Database\Seeder;

class AnimalSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal = new Animal();
        $animal->name = 'Snake';
        $animal->name_ar = 'Snake AR';
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Camel';
        $animal->name_ar = 'Camel AR';
        $animal->save();

        $animal = new Animal();
        $animal->name = 'Dog';
        $animal->name_ar = 'Dog AR';
        $animal->save();
    }
}
