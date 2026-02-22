<?php

namespace App\Models;

use App\Models\Topic;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
{
    use HasUlids, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'creator_id',
    ];

    protected function casts() {
       return [
            'created_at' => 'datetime:Y-m-d g:iA',
            'updated_at' => 'datetime:Y-m-d g:iA',
        ];
    } 

    /**
     * Summary of categories
     * @return HasMany<Category, Board>
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Summary of topics
     * @return HasMany<Topic, Board>
     */
    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    /**
     * Summary of creator
     * @return BelongsTo<User, Board>
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }


}
