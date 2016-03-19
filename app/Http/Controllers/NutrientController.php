<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

use App\Http\Requests;

class NutrientController extends Controller
{
    public function show($id)
    {
        $food = Food::find($id);
        $nutrients = $food->nutrients;
        return view('nutrient.show', compact('food', 'nutrients'));
        //return $nutrients;
    }
}
