<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todo_items = Todo::latest()->get();
        $deleted_todo_items = Todo::onlyTrashed()->get();
        return view('todo.index',compact('todo_items','deleted_todo_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|unique:todos,item_name',
        ]);
        Todo::insert([
            'item_name' => $request->item_name,
            'created_at' => Carbon::now(),
        ]);
        return redirect('todo')->with('success','New Todo Item added Successfull!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {

        if( $todo->item_name == $request->item_name){
            $todo->item_name;
        }else{
            $request->validate([
                'item_name' => 'unique:todos,item_name'
            ]);
        }
        
        $todo->item_name = $request->item_name;
        $todo->save();
        return redirect('todo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back();
    }

    public function todo_restore($id)
    {
        Todo::withTrashed()->where('id',$id)->restore();
        return back();
    }

    public function todo_empty($id)
    {
        Todo::withTrashed()->where('id',$id)->forceDelete();
        return back();
    }
}
