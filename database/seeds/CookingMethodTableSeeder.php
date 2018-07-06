<?php

use Illuminate\Database\Seeder;
use App\Model\CookingMethod;

class CookingMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $method1 = new CookingMethod();
        $method1->cooking_method = 'Nấu';
        $method1->save();

        $method2 = new CookingMethod();
        $method2->cooking_method = 'Luộc';
        $method2->save();

        $method3 = new CookingMethod();
        $method3->cooking_method = 'Rán';
        $method3->save();

        $method4 = new CookingMethod();
        $method4->cooking_method = 'Chiên';
        $method4->save();

        $method5 = new CookingMethod();
        $method5->cooking_method = 'Hấp';
        $method5->save();

        $method6 = new CookingMethod();
        $method6->cooking_method = 'Nướng';
        $method6->save();

        $method7 = new CookingMethod();
        $method7->cooking_method = 'Xào';
        $method7->save();
    }
}
