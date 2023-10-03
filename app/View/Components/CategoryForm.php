<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryForm extends Component
{
    public readonly string $route;
<<<<<<< HEAD

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $route,
        public readonly ?string $method = null,
        public readonly ?Category $category = null
    ) {
        $this->route = route($route, $category);
=======
    public string $parentId = '';
    public string $parentName = '';

    public function __construct(
        string $route,
        public readonly ?string $method = null,
        public readonly ?Category $category = null,
        readonly ?Category $parent = null
    ) {
        $this->route = route($route, $category);

        if ($parent?->exists) {
            $this->parentName = $parent->name;
            $this->parentId = $parent->id;
        } else {
            $this->parentName = 'None. This category will be created as root.';
        }
>>>>>>> cats
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-form');
    }
}
