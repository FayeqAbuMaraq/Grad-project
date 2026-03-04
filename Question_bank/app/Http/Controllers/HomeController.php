<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

class HomeController extends Controller
{
public function index()
{

    $grades = Grade::all();
    return view('index', compact('grades'));
}
}
