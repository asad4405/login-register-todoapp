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

                        <div class="table">
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
                                                <div class="row">
                                                    <div class="col-3">
                                                        <a href="{{ route('todo.edit', $todo_item->id) }}"
                                                            class="btn btn-sm btn-info text-white">Edit</a>
                                                    </div>
                                                    <div class="col-3">
                                                        <form action="{{ route('todo.destroy', $todo_item->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger text-white">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p class="text-center text-danger">No Item Available</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center text-danger">Recycle Bin TO Do List</h3>
                    </div>
                    <div class="card-body">

                        <div class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Serial no.</th>
                                        <th>Todo Item List</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @forelse ($deleted_todo_items as $deleted_todo_item)
                                    <tbody>
                                        <tr class="">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $deleted_todo_item->item_name }}</td>
                                            <td>{{ $deleted_todo_item->created_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <a href="{{ route('todo.restore', $deleted_todo_item->id) }}"
                                                            class="btn btn-sm btn-success text-white">Restore</a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="{{ route('todo.empty', $deleted_todo_item->id) }}"
                                                            class="btn btn-sm btn-danger text-white">Empty</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <p class="text-center text-danger">No Item Available</p>
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
