<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class BorrowControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_when_trying_to_borrow_a_book(): void
    {
        $book = Book::factory()->create([
            'status' => 'AVAILABLE',
        ]);

        $response = $this->from('/catalog')->post(route('borrow', $book));

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('borrowings', 0);
        $this->assertEquals('AVAILABLE', $book->fresh()->status);
    }

    public function test_user_cannot_borrow_a_book_that_is_not_available(): void
    {
        $user = User::factory()->create();

        $book = Book::factory()->create([
            'status' => 'BORROWED',
        ]);

        $response = $this
            ->actingAs($user)
            ->from('/catalog')
            ->post(route('borrow', $book));

        $response->assertRedirect('/catalog');
        $response->assertSessionHas('error', "Ce livre n'est pas disponible.");

        $this->assertDatabaseCount('borrowings', 0);
        $this->assertEquals('BORROWED', $book->fresh()->status);
    }

    public function test_user_can_borrow_an_available_book(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-06-24 12:00:00'));

        $user = User::factory()->create();

        $book = Book::factory()->create([
            'name' => 'Laravel pour les nuls',
            'status' => 'AVAILABLE',
        ]);

        $response = $this
            ->actingAs($user)
            ->from('/catalog')
            ->post(route('borrow', $book));

        $response->assertRedirect('/catalog');
        $response->assertSessionHas(
            'success',
            'Laravel pour les nuls emprunté. Date limite : 08/07/2026'
        );

        $this->assertDatabaseHas('borrowings', [
            'client_id' => $user->id,
            'status' => 'ACTIVE',
        ]);

        $this->assertEquals('BORROWED', $book->fresh()->status);

        $borrowing = Borrowing::first();

        $this->assertNotNull($borrowing);
        $this->assertTrue(
            $book->fresh()->borrowings()->whereKey($borrowing->id)->exists()
        );

        Carbon::setTestNow();
    }
}
