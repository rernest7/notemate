<?php

namespace App\Actions\Notes;

use App\Models\Note;
use App\Services\MarkDownService;

class ReadNote
{
    private $md;
    public function __construct()
    {
        $this->md = new MarkDownService();
    }

    public function execute(string $body): string
    {
        $text = $this->md->parse($body);
        return $text;
    }
}
