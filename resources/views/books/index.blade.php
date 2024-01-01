@extends('layouts.app')

@section('title', 'Book List')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Book List</h1>

    <form method="GET" action="{{ route('books.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="name">Filter by Name:</label>
                <input type="text" name="name" id="name" placeholder="Book Name" class="form-control" value="{{ request('name') }}">
            </div>
            <div class="col-md-4">
                <label for="publishing_date">Filter by Publishing Date:</label>
                <input type="date" name="publishing_date" id="publishing_date" class="form-control" value="{{ request('publishing_date') }}">
            </div>
            <div class="col-md-4">
                <label for="category">Filter by Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-2">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Clear Filters</a>
            </div>
        </div>
    </form>

    <table id="booksTable" class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Published Date</th>
                <th scope="col">Publisher</th>
                <th scope="col">Pages</th>
                <th scope="col">Category</th>
                <th scope="col">Availability</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
            <tr>
                <th scope="row">{{ $book->id }}</th>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->published_date }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->category }}</td>
                <td>{{ $book->available ? "Available" : "Unavailable" }}</td>
                <td>
                    <div class="d-flex justify-content-around" style="gap:12px">
                        @if ($book->available)
                        <form action="{{ route('books.rent', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to rent this book?');">
                            @csrf
                            <button type="submit" class="btn btn-success">Rent</button>
                        </form>
                        @endif

                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Details</a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No books available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->links('pagination::bootstrap-4') }}
</div>
@endsection
