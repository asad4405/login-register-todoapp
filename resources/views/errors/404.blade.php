@extends('layouts.frontend_master')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">

                    <div class="card-body">
                        <h3 class="text-center">Page Not Found</h3>
                        <div class="text-center">
                            <a href="{{ route('index') }}">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
