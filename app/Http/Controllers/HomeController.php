<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Recipe;
use App\Model\Material;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        foreach ($recipes as $recipe) {
            $recipe['materials'] = $recipe->materials()->first();
            $recipe['diffculty'] = $recipe->diffculty()->value('diffculty');
            $recipe['courses'] = $recipe->courses()->value('type')  ;
        }
        dump($recipes);
        return view('welcome');
    }
}
