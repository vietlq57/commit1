<?php

namespace App\Http\Controllers;

use App\Food;
use App\Group;
use App\Nutrient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class FoodsController extends Controller{



    public function show($id){
        $foods = Group::find($id)->foods;
        return view('foods.show', compact('foods'));
    }

    public function create(){


        $groups = Group::all();
        $nutrients = Nutrient::all();
        return view('foods.create', compact('groups', 'nutrients'));
    }

    public function store(Request $request){
        $nutrients = Nutrient::all();

        $group = group::find($request->input('groups'));
        $food = new food();
        $food->vi_name = $request->input('vi_name');
        $food->en_name = $request->input('en_name');

        $group->foods()->save($food);

        foreach($nutrients as $nutrient){

            if($request->input($nutrient->id) != ''){
                $food->nutrients()->attach($nutrient, ['value' => $request->input($nutrient->id)]);
            }
        }


        return redirect('/');
    }

}
