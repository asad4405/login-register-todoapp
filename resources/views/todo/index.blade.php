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
                        <h3 class="text-center">Show TO Do List</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td colspan="3">
                                        <h5 class="text-primary">Click on Create ToDo Item to add new Item</h5>
                                    </td>
                                    <td>
                                        <a href="{{ route('todo.create') }}" class="btn btn-success">Create Todo Item</a>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial no.</th>
                                        <th>Todo Item List</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @forelse ($todo_items as $todo_item)
                                    <tbody>
                                        <tr class="">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $todo_item->item_name }}</td>
                                            <td>{{ $todo_item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('todo.edit',$todo_item->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                                                <a href="" class="btn btn-sm btn-danger text-white">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p class="text-danger">No Item Available</p>
                                        </td>
                                    </tr>
                                @endforelse

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
