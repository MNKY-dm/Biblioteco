<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Gate;

class StaffDashboardController extends Controller
{

    public function show()
    {
        Gate::authorize('access-staff-dashboard');

        $books = Book::orderBy('name')
            ->paginate(8, ['*'], 'books_page');

        $borrowings = Borrowing::with('books', 'user')
            ->latest()
            ->paginate(8, ['*'], 'borrowings_page');

        return view('staff.dashboard', compact('books', 'borrowings'));
    }


}
