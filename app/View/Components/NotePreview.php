<?php

namespace App\View\Components;

use Closure;
use App\Models\Note;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NotePreview extends Component
{
    public function __construct(
        public readonly Note $note,
        public string $headingTag = 'h1'
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.note-preview');
    }
}
