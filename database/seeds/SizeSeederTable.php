<?php

use App\Model\Size;

use Illuminate\Database\Seeder;

class SizeSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size = new Size();
        $size->name = 'Small';
        $size->name_ar = 'Small AR';
        $size->save();

        $size = new Size();
        $size->name = 'Medium';
        $size->name_ar = 'Medium AR';
        $size->save();

        $size = new Size();
        $size->name = 'Large';
        $size->name_ar = 'Large AR';
        $size->save();
    }
}
