<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $summary
 * @property string $author
 * @property string $image_path
 * @property string $language
 * @property string $status
 * @property string $published_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereUpdatedAt($value)
 */
	class Book extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $client_id
 * @property string $start_date
 * @property string $deadline
 * @property string $status
 * @property string|null $returned_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereReturnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Borrowing whereUpdatedAt($value)
 */
	class Borrowing extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id_book
 * @property int $borrowing_id
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BorrowingBook newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BorrowingBook newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BorrowingBook query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BorrowingBook whereBorrowingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BorrowingBook whereIdBook($value)
 */
	class BorrowingBook extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Book> $books
 * @property-read int|null $books_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tag whereUpdatedAt($value)
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $id_role
 * @property string|null $tel
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Role|null $role
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

