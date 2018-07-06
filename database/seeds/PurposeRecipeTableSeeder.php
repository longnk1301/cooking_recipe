<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposeRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purpose_recipe')->insert(
            array
            (
                array('purpose_id' => 1, 'recipe_id' => 1),
                array('purpose_id' => 2, 'recipe_id' => 1),
                array('purpose_id' => 3, 'recipe_id' => 1),
                array('purpose_id' => 1, 'recipe_id' => 2),
                array('purpose_id' => 2, 'recipe_id' => 2),
                array('purpose_id' => 2, 'recipe_id' => 3),
                array('purpose_id' => 3, 'recipe_id' => 3),
            )
        );
    }
}
