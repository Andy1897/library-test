<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Book
 * @property $title
 * @package App\Models
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
