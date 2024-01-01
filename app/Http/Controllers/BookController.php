<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rental;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('name') && $request->get('name') != "") {
            $query->where('name', 'like', '%' . trim($request->input('name')) . '%');
        }

        if ($request->has('publishing_date') && $request->get('publishing_date') != "") {
            $query->where('published_date', $request->input('publishing_date'));
        }

        if ($request->has('category') && $request->get('category') != "") {
            $query->where('category', $request->input('category'));
        }

        $books = $query->paginate(20);

        $filters = $request->only(['name', 'publishing_date', 'category']);
        $categories = Book::distinct('category')->pluck('category');

        return view('books.index', compact('books', 'filters', 'categories'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($id);
        $bookRented = Rental::where('book_id', $book->id)->where('user_id', $user->id)->exists();

        return view('books.show', compact(['book', 'bookRented']));
    }

    public function rent($id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($id);

        if ($user->rentals()->count() >= 4) {
            return redirect()->back()->with('error', 'You can only rent 4 books at a time.');
        }

        if (!$book->available) {
            return redirect()->back()->with('error', 'This book is not available for rent.');
        }

        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->book_id = $book->id;
        $rental->rental_date = now();
        $rental->return_date = now()->addDays(3);
        $rental->save();

        $book->available = false;
        $book->save();

        return redirect()->back()->with('success', 'Book rented successfully.');
    }

    public function return($id)
    {
        $user = Auth::user();
        $book = Book::findOrFail($id);
        $deleteRental = Rental::where('book_id', $book->id)->where('user_id', $user->id)->delete();
        if ($deleteRental) {
            $book->available = true;
            $book->save();
        }

        return redirect('profile')->with('success', 'Book returned successfully.');
    }
}
