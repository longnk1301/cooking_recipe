<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(CookingMethodTableSeeder::class);
        $this->call(DiffcultyTableSeeder::class);
        $this->call(DishTypeTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(OccasionTableSeeder::class);
        $this->call(PurposeTableSeeder::class);
        $this->call(RecipeTableSeeder::class);
    }
}
