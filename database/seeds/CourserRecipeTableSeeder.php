<?php

use Illuminate\Database\Seeder;
use App\Model\Course;
use DB;

class CourserRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('course_recipe')->insert(
    	// 	array
    	// 	(
     //            array('id' => 1,'course_id' => 1, 'recipe_id' => 1, 'created_at' => dateTime(), 'updated_at' => dateTime()),
     //            array('id' => 2,'course_id' => 2, 'recipe_id' => 2, 'created_at' => dateTime(), 'updated_at' => dateTime()),
     //            array('id' => 3,'course_id' => 3, 'recipe_id' => 3, 'created_at' => dateTime(), 'updated_at' => dateTime()),
     //            array('id' => 4,'course_id' => 1, 'recipe_id' => 3, 'created_at' => dateTime(), 'updated_at' => dateTime()),
     //        )
    	// );
    	

    	$pivot = Course::create(['id' => '6', 'type' => 'ABC']);
		$user->recipes()->sync([1,2]); // array of role ids

		$pivot = Course::create(['id' => '7', 'type' => 'ABCSFHDSJ']);
		$user->recipes()->sync([3,4]); // array of role ids
    }
}
