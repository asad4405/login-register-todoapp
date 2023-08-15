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
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('todo.store') }}" method="POST">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Add an item" name="item_name">
                                    @error('item_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <br>
                                    <button type="submit" class="btn btn-sm btn-primary">Add Item</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Show TO Do List</h3>
                    </div>
                    <div class="card-body">
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
                                                <a href="" class="btn btn-sm btn-info text-white">Edit</a>
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
    @endsection



    {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
