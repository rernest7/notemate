<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermTaxonomy extends Model
{
    use HasFactory;

    protected $fillable = ['term_id', 'parent_id'];

    public function term(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'term_id', 'id');
    }

    public function parentTerm(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
