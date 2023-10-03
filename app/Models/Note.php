<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id'];

    public static function booted()
    {
        static::saving(function (Note $note) {
            if (!$note->category_id) {
                $note->category_id = config('defaults.default_category_id');
            }
        });
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->body), 250);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
