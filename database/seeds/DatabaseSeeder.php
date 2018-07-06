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
        $this->call(CourserRecipeTableSeeder::class);
        $this->call(OccasionRecipeTableSeeder::class);
        $this->call(PurposeRecipeTableSeeder::class);
        $this->call(RateTableSeeder::class);
        $this->call(RateRecipeTableSeeder::class);
        $this->call(CollectionTableSeeder::class);
        $this->call(CollectionRecipeTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(ImageRecipeTableSeeder::class);
        $this->call(MakingTableSeeder::class);
    }
}
