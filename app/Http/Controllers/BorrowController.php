<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class BorrowController extends Controller
{
    /**
     * @throws Throwable
     */
    public function borrow(Book $book)
    {
        $user = Auth::user();

        if (!$user->canBorrow()) {
            return redirect()->back()->with('error', "Vous ne pouvez pas emprunter pour le moment.");
        }

        if ($book->status !== 'AVAILABLE') {
            return redirect()->back()->with('error', "Ce livre n'est pas disponible.");
        }

        $deadline = now()->addDays(14);

        DB::transaction(function () use ($user, $book, $deadline) {
            $borrowing = \App\Models\Borrowing::create([
                'client_id' => $user->id,
                'start_date' => now(),
                'deadline' => $deadline,
                'status' => 'ACTIVE',
            ]);

            $book->status = 'BORROWED';
            $book->save();

            $book->borrowings()->attach($borrowing->id);
        });

        return redirect()->back()->with(
            'success',
            $book->name . ' emprunté. Date limite : ' . $deadline->format('d/m/Y')
        );
    }

    public function showMyBorrowings()
    {
        $user = Auth::user();
        $borrowings = $user->borrowings()->with('books')->get();

        return view('my-borrowings', compact('borrowings'));
    }

    public function returnBorrowing(Borrowing $borrowing)
    {
        if ($borrowing->client_id !== Auth::id()) {
            abort(403);
        }

        if ($borrowing->status !== 'ACTIVE') {
            return redirect()->route('my-borrowings')->with('error', 'Cet emprunt est déjà clôturé.');
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->status = 'RETURNED';
            $borrowing->save();

            foreach ($borrowing->books as $book) {
                $book->status = 'AVAILABLE';
                $book->save();
            }
        });

        return redirect()->route('my-borrowings')->with('success', 'Emprunt rendu avec succès.');
    }
}
