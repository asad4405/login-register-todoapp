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
                        <h3 class="text-center">To Do Item Create & Show</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('todo.create') }}" class="btn btn-info">Click Here to Todo Create</a>
                            <a href="{{ route('todo.index') }}" class="btn btn-success">Click Here to Todo Show</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
