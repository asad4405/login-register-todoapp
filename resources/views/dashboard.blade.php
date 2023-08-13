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
                        <h3 class="text-center">Create To Do</h3>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">TO Do List</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">Column 1</th>
                                        <th scope="col">Column 2</th>
                                        <th scope="col">Column 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                    </tr>
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td>Item</td>
                                    </tr>
                                </tbody>
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
