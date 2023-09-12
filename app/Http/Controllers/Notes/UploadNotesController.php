<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
final class UploadNotesController extends Controller
{
    public function index(Request $request)
    {
        $file = $request->noteFile;
        $ext = $file->extension();
        abort_if(!($ext === 'txt'), 403);

        $title = $file->getClientOriginalName();
        $title = str_replace('.txt', '', $title);
        $body = file_get_contents($file);

        $note = Note::create([
            'title' => $title,
            'body' => $body,
        ]);

        return redirect()->route('notes.show', $note->id);
    }
}
