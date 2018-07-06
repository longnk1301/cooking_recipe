<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rate_recipe')->insert(
            array
            (
                array('rate_id' => 1, 'recipe_id' => 1),
                array('rate_id' => 4, 'recipe_id' => 1),
                array('rate_id' => 2, 'recipe_id' => 2),
                array('rate_id' => 5, 'recipe_id' => 2),
                array('rate_id' => 3, 'recipe_id' => 3),
                array('rate_id' => 4, 'recipe_id' => 3),
            )
        );
    }
}
