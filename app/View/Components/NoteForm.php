<?php

namespace App\View\Components;

use Closure;
use App\Models\Note;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class NoteForm extends Component
{
    public readonly string $route;

    public function __construct(
        string $route,
        public readonly ?string $method = null,
        public readonly ?Note $note = null,
        public ?Collection $categories = null,
        public readonly array $prefills = []
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
