<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('page.index', compact('groups'));
    }
}
