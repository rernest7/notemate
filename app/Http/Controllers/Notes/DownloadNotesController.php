<?php

namespace App\Http\Controllers\Notes;

use App\Services\MarkdownService;
use App\Models\Note;
use App\Http\Controllers\Controller;

final class DownloadNotesController extends Controller
{
    public function index(string $id, string $format)
    {
        abort_if(!($format === 'txt'), 403);
        $note = Note::findOrFail($id);
$content = "# ".$note->title."\n";
        $content .= $note->body;
        $filename = \Str::slug($note->title);
        
        $headers = [
            // 'Content-type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'.txt"',
        ];

        return \Response::make($content, 200, $headers);
    }
}
