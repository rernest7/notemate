<?php

namespace App\Models;

use App\Models\Note;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory,     NodeTrait;

    protected $fillable = ['name', 'description', 'parent_id', 'first_parent_id'];


    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}
