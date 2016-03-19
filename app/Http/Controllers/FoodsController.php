<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;

class FoodsController extends Controller
{
    public function show($id){
        $foods = Group::find($id)->foods;
        return view('foods.show', compact('foods'));
    }
}
