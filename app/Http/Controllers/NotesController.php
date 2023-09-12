<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\MarkdownService;
use \App\Http\Requests\NoteRequest;
use App\Http\Controllers\Controller;
use App\Services\MarkdownServiceInterface;

final class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $notes = Note::latest()->paginate(15);
        $notesCount = Note::count();

        return view('notes.index', [
            'notes' => $notes,
            'notesCount' => $notesCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('notes.create', [
            'note' => null,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note, MarkdownServiceInterface $md): View
    {
        $note->body = nl2br($md->parse($note->body));

        return view('notes.show', [
            'note' => $note,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note): View
    {
        return view('notes.create', [
            'note' => $note,
        ]);
    }

    /**
     * Update or Create a resource
     */
    public function store(NoteRequest $request)
    {
        $id = $request->input('note_id', null);
        if ($id) {
            $note = Note::findOrFail($id);
            $note->update($request->validated());
        } else {
            $note = Note::create($request->all());
        }

        return redirect()->route('notes.show', $note->id);
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
