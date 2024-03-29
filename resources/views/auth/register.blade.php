@extends('layouts.app')

@section('title', 'Register')

@section('content')
<h1>Register</h1>

<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="image">Profile Image:</label>
        <input type="file" name="image" id="image" class="form-control-file">
    </div>

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection
