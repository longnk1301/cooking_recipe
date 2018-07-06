<?php

use Illuminate\Database\Seeder;
use App\Model\Occasion;

class OccasionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occasion1 = new Occasion();
        $occasion1->occasion = 'Noel';
        $occasion1->save();

        $occasion2 = new Occasion();
        $occasion2->occasion = 'Tết Nguyên Đán';
        $occasion2->save();

        $occasion3 = new Occasion();
        $occasion3->occasion = 'Sinh nhật';
        $occasion3->save();

        $occasion4 = new Occasion();
        $occasion4->occasion = 'Lễ tình nhân';
        $occasion4->save();

        $occasion5 = new Occasion();
        $occasion5->occasion = 'Cơm gia đình';
        $occasion5->save();
    }
}
