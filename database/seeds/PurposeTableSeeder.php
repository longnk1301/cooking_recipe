<?php

use Illuminate\Database\Seeder;
use App\Model\Purpose;
use App\Model\Recipe;

class PurposeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose1 = new Purpose();
        $purpose1->purpose = 'Món vặt gíup tránh đói!!';
        $purpose1->recipe_id = 1;
        $purpose1->save();

        $purpose2 = new Purpose();
        $purpose2->purpose = 'Tăng cường sức khỏe, có thể coi là 1 món chính';
        $purpose2->recipe_id = 2;
        $purpose2->save();

        $purpose3 = new Purpose();
        $purpose3->purpose = 'Tăng canxi, gíup tăng chiều cao!!';
        $purpose3->recipe_id = 3;
        $purpose3->save();
    }
}
