<?php

namespace App\Http\Controllers\Notes;

use App\Models\Note;
use App\Actions\Notes\ReadNote;
use App\Services\MarkDownService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ShowNote  extends Controller
{
    public function __construct(
        private MarkDownService $md,
        private Cache $cache
    ) {
    }
    public function __invoke(int $id): View
    {
        $note = Note::findOrFail($id);

        // @todo cache the parsing.
        // this will also require for cache to be cleaned
        // i think best if in edit/update methods

        $parser = new ReadNote($this->md);
        $note->body = $parser->execute($note->body);

        return view('notes.show', [
            'note' => $note,
        ]);
    }
}
