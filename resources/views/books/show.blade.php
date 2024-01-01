<!-- resources/views/books/show.blade.php -->

@extends('layouts.app')

@section('title', 'Book Details')

@section('content')
<h1>Book Details</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $book->name }}</h5>
        <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
        <p class="card-text"><strong>Published Date:</strong> {{ $book->published_date }}</p>
        <p class="card-text"><strong>Publisher:</strong> {{ $book->publisher }}</p>
        <p class="card-text"><strong>Pages:</strong> {{ $book->pages }}</p>
        <p class="card-text"><strong>Category:</strong> {{ $book->category }}</p>
        <div class="d-flex" style="gap: 12px">
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Book List</a>
            @if ($bookRented)
            <form action="{{ route('books.return', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to return this book?');">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Return Book</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
