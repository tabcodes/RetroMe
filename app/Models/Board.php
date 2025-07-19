<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'creator_id',
    ];

    /**
     * Summary of categories
     * @return HasMany<Category, Board>
     */
    public function categories(): HasMany {
        return $this->hasMany(Category::class);
    }

    /**
     * Summary of topics
     * @return HasMany<Topic, Board>
     */
    public function topics(): HasMany {
        return $this->hasMany(Topic::class);
    }
    
    /**
     * Summary of creator
     * @return BelongsTo<User, Board>
     */
    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'creator_id');
    }
}