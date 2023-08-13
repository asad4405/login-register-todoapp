@extends('layouts.frontend_master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Welcome To ToDo App</h3>
                    </div>

                    <div class="card-body">
                        <p>To Do is a task management app to help you stay organized and manage your day-to-day. You can use
                            To Do to make shopping lists or task lists, take notes, record collections, plan an event, or
                            set reminders to increase your productivity and focus on what matters to you. </p>
                        @guest
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="text-center">Please Login & Go to Dashboard</a>
                            </div>
                        @else
                            <div class="text-center">
                                <a href="{{ route('login') }}" class="text-center">
                                    Go to Dashboard
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
