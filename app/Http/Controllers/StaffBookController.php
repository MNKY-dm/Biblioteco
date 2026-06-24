<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Gate;

class StaffBookController extends Controller
{
    public function edit(Book $book)
    {
        Gate::authorize('access-staff-dashboard');

        return view('staff.books.edit', compact('book'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        Gate::authorize('access-staff-dashboard');

        $book->update($request->validated());

        return redirect()
            ->route('staff.dashboard')
            ->with('success', 'Livre mis à jour avec succès.');
    }
}
