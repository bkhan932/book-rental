@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Select New Profile Image:</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
