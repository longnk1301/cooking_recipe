<?php

use Illuminate\Database\Seeder;
use App\Model\DishType;

class DishTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishType1 = new DishType();
        $dishType1->dish_type = 'Kem';
        $dishType1->save();

        $dishType2 = new DishType();
        $dishType2->dish_type = 'Súp';
        $dishType2->save();

        $dishType3 = new DishType();
        $dishType3->dish_type = 'Lẩu';
        $dishType3->save();

        $dishType4 = new DishType();
        $dishType4->dish_type = 'Chè';
        $dishType4->save();

        $dishType5 = new DishType();
        $dishType5->dish_type = 'Bánh ngọt';
        $dishType5->save();

        $dishType6 = new DishType();
        $dishType6->dish_type = 'Sinh tố';
        $dishType6->save();

        $dishType7 = new DishType();
        $dishType7->dish_type = 'Nướng';
        $dishType7->save();

        $dishType8 = new DishType();
        $dishType8->dish_type = 'Bún';
        $dishType8->save();
    }
}
