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
