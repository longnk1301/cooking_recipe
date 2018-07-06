<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccasionRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occasion_recipe')->insert(
            array
            (
                array('occasion_id' => 1, 'recipe_id' => 1),
                array('occasion_id' => 1, 'recipe_id' => 2),
                array('occasion_id' => 2, 'recipe_id' => 1),
                array('occasion_id' => 2, 'recipe_id' => 3),
                array('occasion_id' => 3, 'recipe_id' => 1),
                array('occasion_id' => 3, 'recipe_id' => 2),
                array('occasion_id' => 3, 'recipe_id' => 3),
            )
        );
    }
}