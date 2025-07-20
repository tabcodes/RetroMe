<?php

namespace App\Models;

use App\Models\Board;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'board_id',
    ];

    /**
     * Summary of board
     * @return BelongsTo<Board, Category>
     */
    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * Summary of topics
     * @return HasMany<Topic, Category>
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
