<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Your App Title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .profile-image {
            cursor: pointer;
        }

        .dropdown-menu {
            right: 0;
            left: auto;
            outline: none;
        }

        .dropdown-item {
            outline: none !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Book Rental</a>
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('books.index') }}">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <img src="{{ asset('storage/user_images/' . Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="rounded-circle profile-image" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 32px; height: 32px; object-fit: cover;">
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Are you sure you want to logout?');">
                        @csrf
                        <button class="dropdown-item" type="submit" class="btn btn-text">Logout</button>
                    </form>
                </div>
            </li>
            @endauth
        </ul>
    </nav>



    <div class="container mt-5">
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
