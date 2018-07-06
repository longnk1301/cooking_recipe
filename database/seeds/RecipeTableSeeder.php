<?php

use Illuminate\Database\Seeder;
use App\Model\Recipe;

class RecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe1 = Recipe::create([
            'name' => 'Cách làm tào phớ đơn giản',
            'time' => 30,
            'section' => 4,
            'cuisine' => 'Đài loan',
            'avatar' => 'images/products/cach-lam-tao-pho-don-gian-tai-nha.jpg',
            'status' => 2,
            'diffculty_id' => 1,
            'dish_type_id' => 1,
            'user_id' => 1,
            'collection_id' => 1,
            'cooking_method_id' => 1,
        ]);

        $recipe2 = Recipe::create([
            'name' => 'Bánh Muffin trứng mặn',
            'time' => 20,
            'section' => 2,
            'cuisine' => 'Việt Nam',
            'avatar' => 'images/products/cach-lam-bong-lan-trung-muoi-khong-bi-tanh.jpg',
            'status' => 2,
            'diffculty_id' => 2,
            'dish_type_id' => 2,
            'user_id' => 1,
            'collection_id' => 1,
            'cooking_method_id' => 2,
        ]);

        $recipe3 = Recipe::create([
            'name' => 'Mojito Shochu',
            'time' => 5,
            'section' => 5,
            'cuisine' => 'Janpanese',
            'avatar' => 'images/products/mojoto.jpeg',
            'status' => 2,
            'diffculty_id' => 2,
            'dish_type_id' => 3,
            'user_id' => 1,
            'collection_id' => 1,
            'cooking_method_id' => 3,
        ]);
    }
}
