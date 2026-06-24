<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AdminDashboardController extends Controller
{
    public function show()
    {
        Gate::authorize('access-admin-dashboard');

        $books = Book::orderBy('name')
            ->paginate(6, ['*'], 'books_page');

        $borrowings = Borrowing::with('books', 'user')
            ->latest()
            ->paginate(6, ['*'], 'borrowings_page');

        $users = User::with('role')
            ->orderBy('surname')
            ->orderBy('name')
            ->paginate(6, ['*'], 'users_page');

        $deletedUsers = User::onlyTrashed()
            ->with('role')
            ->orderBy('surname')
            ->orderBy('name')
            ->paginate(6, ['*'], 'deleted_users_page');

        return view('admin.dashboard', compact('books', 'borrowings', 'users', 'deletedUsers'));
    }
}
