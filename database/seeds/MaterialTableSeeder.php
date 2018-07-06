<?php

use Illuminate\Database\Seeder;
use App\Model\Material;
use App\Model\Recipe;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $material1 = new Material();
        $material1->main_material = 'Gạo';
        $array1 = [
            'bột ớt',
            'sốt',
        ];
        $material1->material = implode(",", $array1);
        $material1->recipe_id = 1;
        $material1->save();

        $material2 = new Material();
        $material2->main_material = 'Bún';
        $array2 = [
            'thịt lợn',
            'hành',
            'nưóc sốt',
        ];
        $material2->material = implode(",", $array2);
        $material2->recipe_id = 2;
        $material2->save();

        $material3 = new Material();
        $material3->main_material = 'Cá';
        $array3 = [
            'dứa',
            'giềng',
            'giấm',
        ];
        $material3->material = implode(",", $array3);
        $material3->recipe_id = 3;
        $material3->save();
    }
}
