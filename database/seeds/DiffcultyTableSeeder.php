<?php

use Illuminate\Database\Seeder;
use App\Model\Diffculty;

class DiffcultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diff1 = new Diffculty();
        $diff1->diffculty = 'Dễ';
        $diff1->save();

        $diff2 = new Diffculty();
        $diff2->diffculty = 'Bình thường';
        $diff2->save();

        $diff2 = new Diffculty();
        $diff2->diffculty = 'Khó';
        $diff2->save();
    }
}
