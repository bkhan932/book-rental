@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Your Profile</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if($user->image)
                        <img width="150" height="150" src="{{ asset('storage/user_images/' . $user->image) }}" alt="Profile Image" class="img-fluid rounded-circle">
                    @else
                        <p>No profile image available.</p>
                    @endif
                </div>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Rented Books</h5>
            @if($rentals->count() > 0)
                <ol>
                    @foreach($rentals as $rental)
                        <a href="{{ route('books.show', $rental->book->id) }}"><li>{{ $rental->book->name }} by {{ $rental->book->author }}</li></a>
                    @endforeach
                </ol>
            @else
                <p>No books rented yet.</p>
            @endif
        </div>
    </div>
@endsection
