<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrow($id) {
        $book = Book::findOrFail($id);

        if (Auth::user()->canBorrow()) {
            if ($book->status === 'DISPONIBLE') {
                $borrowing = Borrowing::create([
                    'client_id' => auth()->user()->id,
                    'start_date' => now(),
                    'deadline' => now()->addDays(14),
                    'status' => 'EN COURS',
                ]);

                $book->status = 'EMPRUNTE';
                $book->borrowings()->attach($borrowing->id);
                $book->save();

                return redirect()->back()->with('success', $book->name . ' emprunté. La date de retour maximum est : ' . now()->addDays(14)->format('d/m/Y'));
            }
        }
    }
}
