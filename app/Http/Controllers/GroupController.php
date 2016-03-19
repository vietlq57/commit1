<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('group.index', compact('groups'));
    }
}
