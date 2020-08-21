<?php

use App\Model\Duration;
use Illuminate\Database\Seeder;

class DurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $duration = new Duration();
        $duration->name = '3 years';
        $duration->name_ar = '3 years';
        $duration->save();

        $duration = new Duration();
        $duration->name = '3 months';
        $duration->name_ar = '3 months';
        $duration->save();

        $duration = new Duration();
        $duration->name = '3 weeks';
        $duration->name_ar = '3 weeks';
        $duration->save();

        $duration = new Duration();
        $duration->name = '3 days';
        $duration->name_ar = '3 days';
        $duration->save();
    }
}
