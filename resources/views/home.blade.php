@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if (auth()->user()->isAdmin())  <!-- Check if the user is an admin -->
                        <div class="admin-dashboard mt-4">
                            <h3>{{ __('Admin Dashboard') }}</h3>
                            <ul>
                                <li><a href="{{ route('admin.users.index') }}">{{ __('Manage Users') }}</a></li>
                                <li><a href="{{ route('admin.settings') }}">{{ __('Site Settings') }}</a></li>
                                <!-- Add more admin-specific links or content here -->
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        .admin-dashboard {
            background-color: #f8f9fa; /* Light grey background */
            border: 1px solid #6e8C48; /* Dark green border */
            padding: 1rem;
            border-radius: 8px; /* Rounded corners */
            margin-top: 1rem;
        }
        .admin-dashboard h3 {
            color: #6e8C48; /* Dark green color */
        }
        .admin-dashboard ul {
            list-style-type: none; /* Remove default list style */
            padding: 0;
        }
        .admin-dashboard li {
            margin-bottom: 0.5rem;
        }
        .admin-dashboard a {
            color: #6e8C48; /* Dark green link color */
            text-decoration: none;
        }
        .admin-dashboard a:hover {
            color: #4a6b3d; /* Darker green on hover */
            text-decoration: underline;
        }
    </style>
@endsection
