@extends('layouts.frontend_master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <h5>
                            Welcome!! {{ auth()->user()->name }}, ToDo Dashboard
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </h5>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <marquee behavior="" direction="">
                            <h5 class="text-danger">Same name can't be added a second time !!</h5>
                        </marquee>
                    </div>
                    <div class="card-header">
                        <h3 class="text-center">Create To Do Item</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('todo.update',$todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Add an item" name="item_name" value="{{ $todo->item_name }}">
                                    @error('item_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-primary">Add Item</button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-5">
                            <a href="{{ route('todo.index') }}">Click Here to Todo List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
