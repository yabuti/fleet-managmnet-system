@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Driver Dashboard</h1>
    <a href="{{ route('dashboard.driver.create') }}" class="btn btn-primary">Create New Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ route('dashboard.driver.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('dashboard.driver.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
