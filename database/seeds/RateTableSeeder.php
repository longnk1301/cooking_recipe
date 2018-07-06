<?php

use Illuminate\Database\Seeder;
use App\Model\Rate;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rate1 = new Rate();
        $rate1->rate = 8;
        $rate1->user_id = 1;
        $rate1->save();

        $rate2 = new Rate();
        $rate2->rate = 7;
        $rate2->user_id = 1;
        $rate2->save();

        $rate3 = new Rate();
        $rate3->rate = 5;
        $rate3->user_id = 1;
        $rate3->save();

        $rate4 = new Rate();
        $rate4->rate = 8;
        $rate4->user_id = 2;
        $rate4->save();

        $rate5 = new Rate();
        $rate5->rate = 9;
        $rate5->user_id = 2;
        $rate5->save();
    }
}
