<?php

namespace App\View\Components;

use Closure;
use App\Models\Note;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NoteForm extends Component
{
    public readonly string $route;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $route,
        public readonly ?string $method = null,
        public readonly ?Note $note = null
    ) {
        $this->route = route($route, $note);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.note-form');
    }
}
