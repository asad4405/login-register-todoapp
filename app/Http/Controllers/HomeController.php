<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $todo_items = Todo::all();
        return view('dashboard',compact('todo_items'));
    }
}
