@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editor Dashboard</h1>
    <!-- Editor-specific content -->
    <p>Welcome, {{ Auth::user()->name }}! You have access to manage and edit content.</p>
    <!-- Example editor controls -->
    <a href="{{ route('articles.index') }}" class="btn btn-primary">Manage Articles</a>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Manage Categories</a>
    <!-- Add other editor-specific links or controls here -->
</div>
@endsection
