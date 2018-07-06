<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use App\Model\Recipe;
use App\Model\Material;
use App\Model\CookingMethod;
use App\Model\DishType;
use App\Model\Diffculty;
use App\Model\Occasion;
use App\Model\Purpose;
use App\Model\Course;
use App\Model\Rate;
use App\Model\Care;
use App\Model\Like;
use DB;

class HomeController extends Controller
{
    public function moveAdmin()
    {
        return view('admin.index');
    }

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

        $users = User::offset(0)
        ->limit(6)
        ->get();
        foreach ($users as $user) {
            $user['cares'] = $user->cares()->pluck('care');
            $user['recipe'] = $user->recipes()->get();
        }

        return view('welcome', compact('users', 'recipes'));
    }

    public function getRecipe()
    {
        return view('customer.recipe');
    }

    public function getDishTypes()
    {
        $getDishTypes = DishType::all()->pluck('dish_type');

        return $getDishTypes;
    }

    public function getCookingMethods()
    {
        $getCooking_methods = CookingMethod::all()->pluck('cooking_method');

        return $getCooking_methods;
    }

    public function getCourses()
    {
        $getCourses = Course::all()->pluck('type');

        return $getCourses;
    }

    public function getAuthCurrent()
    {
        $user = Auth::user();

        return $user;
    }

    public function getLists()
    {
        $getCourses = Course::all()->pluck('type');
        $getCooking_methods = CookingMethod::all()->pluck('cooking_method');
        $getDiffculties = Diffculty::all()->pluck('diffculty');
        $getDishtypes = DishType::all()->pluck('dish_type');
        $getMaterials = Material::all()->pluck('main_material');
        $getOccasions = Occasion::all()->pluck('occasion');
        $getPurposes = Purpose::all()->pluck('purpose');
        $getCuisines = Recipe::all()->pluck('cuisine');

        $lists = [
            'courses' => $getCourses,
            'cooking_methods' => $getCooking_methods,
            'diffculties' => $getDiffculties,
            'dish_types' => $getDishtypes,
            'materials' => $getMaterials,
            'occasions' => $getOccasions,
            'purposes' => $getPurposes,
            'cuisines' => $getCuisines,
        ];

        return response()->json($lists);
    }

    public function getDetailRecipe() {

        return view('customer.details_recipe');
    }

    public function Profile()
    {

        return view('customer.profile');
    }

    public function ChangeNone(Request $request, $id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe->status = 4;
        $recipe->save();

        return response([
            'result' => 'Thay đổi thành công!'
        ], 200);
    }

    public function ChangePending(Request $request, $id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe->status = 1;
        $recipe->save();

        return response([
            'result' => 'Thay đổi thành công!'
        ], 200);
    }

    public function ChangeDisable(Request $request, $id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe->status = 0;
        $recipe->save();

        return response([
            'result' => 'Thay đổi thành công!'
        ], 200);
    }

    public function ChangeShow(Request $request, $id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $recipe->status = 2;
        $recipe->save();

        return response([
            'result' => 'Thay đổi thành công!'
        ], 200);
    }

    public function getProfile()
    {
        $user = Auth::user()->first();
        $number_care = Care::where('user_id', $user->id)->get();
        $cares = Care::distinct()->get(['user_id', 'who']);

        foreach ($cares as $property) {
            $property['users'] = User::where('id', $property->who)
                ->inRandomOrder()
                ->limit(8)
                ->get();
            $property['users_you_care'] = User::where('id', $property->user_id)
                ->inRandomOrder()
                ->get();
        }

        $likes = Like::where('who', $user->id)->get();
        foreach ($likes as $like) {
            $like['recipe'] = Recipe::where('id', $like->recipe_id)
            ->inRandomOrder()
            ->get();
        }


        $data = [
            $user,
            $number_care,
            $cares,
            $likes,
        ];

        return $data;
    }

    public function getMyRecipe()
    {
        $user = Auth::user()->first();
        $recipes = Recipe::where('user_id', $user->id)->get();

        return $recipes;
    }

    public function EditProfile(Request $request, $id)
    {
        // dd($id);
        $this->validate($request, [
            'name' => 'required|string|min:4|max:255'
        ]);
        $user = User::find($id);

        $user->name = $request->input('name');
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
            $user->avatar = 'images/' . $fileName;
        }
        $user->save();

        return response([
            'result' => 'Chỉnh sửa thành công!'
        ], 200);
    }

    public function upLikeNumber(Request $request)
    {
        $userCurrent = Auth::user();
        $recipe = Recipe::find($request->id);
        $like = new Like();
        $like->like = $like->like + 1;
        $like->recipe_id = $recipe->id;
        $like->who = $userCurrent->id;
        $like->save();

        return $recipe;
    }

    public function upCareNumber(Request $request)
    {
        $userCurrent = Auth::user();
        $user = User::find($request->id);

        $findCare = Care::where('user_id', $user->id)
            ->where('who', $userCurrent->id)->first();

        // if($findCare == true) {
        //     return response([
        //         'result' => 'Bạn đã quan tâm tới người này!']);
        // }
        // else {
            $cares = new Care();
            $cares->care = $cares->care + 1;
            $cares->user_id = $user->id;
            $cares->who = $userCurrent->id;
            $cares->save();

            return $user;
        // }
    }

    public function changeRateNumber(Request $request)
    {
        $userCurrent = Auth::user();
        $recipe = Recipe::find($request->id);
        $rate = new Rate();
        $rate->rate = $request->number_rate;
        $rate->user_id = $userCurrent->id;
        $rate->save();
        $rate->recipes()->attach($recipe->id);

        $result = 0;
        $length = count($recipe->rates);
        $total = 0;
        foreach ($recipe->rates as $rates) {
            $number_rate = $rates->rate;
            $total += $number_rate;
        }
        $result = $total/$length;

        return $result;
    }

    // public function findText(Request $request)
    // {
    //     $keyword = $request->text;
    //     $findCourse = Course::where('type', $keyword)->first();
    //     $findRecipe = Recipe::where('course')
    // }
}
