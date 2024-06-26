<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Actions\Notes\ReadNote;
use \App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\MarkdownServiceInterface;

final class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $search = $request->input('q');
        if ($search) {
            $search = "%{$search}%";
            $notes = Note::orWhere('title', 'LIKE', $search)->orWhere('body', 'LIKE', $search)->paginate();
        } else {
            $notes = Note::latest()->paginate();
        }

        // while $notes is a pagination collection thiss will work
        $notesCount = $notes->total();

        return view('notes.index', [
            'notes' => $notes,
            'notesCount' => $notesCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $prefills = [
            'category' => (int) $request->input('category')
        ];

        return view('notes.create', [
            'note' => null,
            'categories' => Category::select(['id', 'name'])->get(),
            'prefills' => $prefills,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note): View
    {
        return view('notes.edit', [
            'note' => $note,
            'categories' => Category::get(),
            'prefills' => ['category' => $note->category_id],
        ]);
    }

    /**
     * Create new resource
     */
    public function store(NoteRequest $request)
    {
        $note = Note::create($request->validated());

        return redirect()->route('notes.show', $note->id);
    }

    /**
     * Update existing resource
     */
    public function update(NoteRequest $request, Note $note): RedirectResponse
    {
        $note->update($request->validated());
        return redirect()->route('notes.show', $note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Note::where('id', $id)->delete();

        return redirect()->route('notes.index');
    }
}
