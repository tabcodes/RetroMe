<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Topic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'creator_id',
        'category_id',
        'board_id',
        'content',
        'notes',
    ];

    /**
     * Summary of category
     * @return BelongsTo<Category, Topic>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Summary of creator
     * @return BelongsTo<User, Topic>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Summary of board
     * @return BelongsTo<Board, Topic>
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
