<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Model\Recipe;
use App\Model\User;
use App\Model\Making;
use App\Model\Material;
use App\Model\Diffculty;
use App\Model\DishType;
use App\Model\CookingMethod;
use App\Model\Purpose;
use App\Model\Course;
use App\Model\Care;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all()->where('status', 2);
        foreach ($recipes as $recipe) {
            $recipe['materials']    = $recipe->materials()->first();
            $recipe['diffculty'] = $recipe->diffculty()->value('diffculty');
            $recipe['courses'] = $recipe->courses()->value('type');
            $recipe['created_by'] = $recipe->user()->value('name');
            $recipe['likes'] = $recipe->likes()->pluck('like');
            $recipe['rates'] = $recipe->rates()->get();
                $recipe['average'] = 0;
                $length = count($recipe->rates);
                $total = 0;
                foreach ($recipe->rates as $rate) {
                    $number  = $rate->rate;
                    $total = $total + $number;
                }
                if ($total === 0) {
                    $recipe['average'] = 0;
                } else {
                    $recipe['average'] = $total/$length;
                }
        }
        return $recipes;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       // dd($request->login);
        $this->validate($request, [
            'name' => 'required|min:5|max:50',
            'time' => 'required|numeric|min:1|max:1000',
            'section' => 'required|numeric|min:1|max:100',
            'cuisine' => 'required|min:3',
            'diffculty' => 'required',
            'dish_type' => 'required',
            'cooking_method' => 'required',
            'avatar' => 'required',
            'making' => 'required',
            'purpose' => 'required|min:3|max:50',
            'course' => 'required',
            'login' => 'required',
        ]);
        if ($request->get('avatar')) {
            $exploded = explode(',', $request->avatar);
            $decoded = base64_decode($exploded[1]);
            if (str_contains($exploded[0], 'jpeg')) {
                $extention = 'jpg';
            } else {
                $extention = 'png';
            }
            $fileName = str_random().'.'.$extention;
            $path = public_path().'/images/'.$fileName;
            file_put_contents($path, $decoded);
        }

        $recipe = Recipe::create([
            'user_id' => $request->login,
            'name' => $request->input('name'),
            'time' => $request->input('time'),
            'section' => $request->input('section'),
            'cuisine' => $request->input('cuisine'),
            'diffculty_id' => $request->input('diffculty'),
            'dish_type_id' => $request->input('dish_type'),
            'cooking_method_id' => $request->input('cooking_method'),
            'avatar' => 'images/' . $fileName,
        ]);

        $making = $request->making;
        foreach($making as $make)
        {
            $newMake = new Making();
            $newMake->recipe_id = $recipe->id;
            $newMake->make = $make['text'];
            $newMake->save();
        }

        $materials = Material::create([
            'main_material' => $request->main_material,
            'material' => $request->material,
            'recipe_id' => $recipe->id,
        ]);

        $purposes = Purpose::create([
            'purpose' => $request->purpose,
        ])->recipes()->attach($recipe->id);

        if($request->course) {
            $course = Course::where('type', $request->course)->first();
            $recipe->courses()->attach($course->id);
        }
        // $purposes->recipes()->attach($recipe->id);

        // if ($request->get('image')) {
        //     $files = $request->avatar;
        //     // dd($files);
        //         $exploded = explode(',', $request->avatar);
        //         // dd($exploded);
        //         $decoded = base64_decode($exploded[1]);
        //         if (str_contains($exploded[0], 'jpeg')) {
        //             $extention = 'jpg';
        //         } else {
        //             $extention = 'png';
        //         }
        //     foreach ($files as $path) {
        //         dd($files);
        //         $images = new Image();
        //         $fileName = str_random().'.'.$extention;
        //         $path = public_path().'/images/'.$fileName;
        //         file_put_contents($path, $decoded);
        //         $images->image = '/images/' . $fileName;
        //         $images->recipe_id = $recipe->id;
        //         $images->save();
        //     }
        // }

        return response(
            [
                'result' => 'Tạo thành công!'
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipes = Recipe::offset(0)
            ->where('status', 2)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($recipes as $recipe) {
            $recipe['user'] = $recipe->user()->value('name');
            $recipe['likes'] = $recipe->likes()->pluck('like');
            $recipe['rates'] = $recipe->rates()->get();
                $recipe['average'] = 0;
                $length = count($recipe->rates);
                $total = 0;
                foreach ($recipe->rates as $rate) {
                    $number  = $rate->rate;
                    $total = $total + $number;
                }
                if ($total === 0) {
                    $recipe['average'] = 0;
                } else {
                    $recipe['average'] = $total/$length;
                }
            }
        $recipe = Recipe::find($id);
        $material = $recipe->materials()->first();
        $making = $recipe->makings()->pluck('make');
        $diffculty = $recipe->diffculty()->value('diffculty');
        $dishtype = $recipe->dishType()->value('dish_type');
        $created_by = $recipe->user()->first();
        $cooking_method = $recipe->cookingMethod()->value('cooking_method');
        $cares = $created_by->cares()->pluck('care');
        $recipe_number = $created_by->recipes()->get();
        return view('customer.details_recipe', compact(
            'recipes', 'cares', 'recipe_number',
            'recipe', 'material', 'making', 'diffculty', 'dishtype', 'created_by', 'cooking_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
