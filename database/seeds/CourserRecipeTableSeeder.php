<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourserRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_recipe')->insert(
            array
            (
                array('course_id' => 1, 'recipe_id' => 1),
                array('course_id' => 2, 'recipe_id' => 2),
                array('course_id' => 3, 'recipe_id' => 3),
                array('course_id' => 1, 'recipe_id' => 3),
            )
        );
    }
}
