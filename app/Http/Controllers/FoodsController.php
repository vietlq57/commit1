<?php

namespace App\Http\Controllers;

use App\Food;
use App\Group;
use App\Nutrient;
use Illuminate\Http\Request;

use App\Http\Requests;


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
        $food = new Food();
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

    /*public function search($search){
        return urldecode($search);
    }*/

    public function destroy($id){
        $food = Food::findOrFail($id);
        $food->nutrients()->detach();
        $food->delete();
        return redirect('/');
    }

    public function edit($id){
        $food = Food::findOrFail($id);
        $groups = Group::all();
        $nutrients = Nutrient::all();



        foreach($food->nutrients as $nutrient){
            $arr[$nutrient->pivot->nutrient_id] = $nutrient->pivot->value;
        }

        $arr = $food->nutrients;

        return view('foods.edit', compact('food', 'groups', 'nutrients', 'arr'));


    }

    public function update($id, Request $request){
        $food = Food::findOrFail($id);

        $nutrients = Nutrient::all();

        $group = group::find($request->input('groups'));

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
