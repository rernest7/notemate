<?php

namespace App\Actions\Notes;

use App\Models\Note;
use App\Services\MarkdownServiceInterface;
use League\CommonMark\Output\RenderedContentInterface;

class ReadNote
{
    public function __construct(
        private MarkdownServiceInterface $md
    ) {
    }
    public function execute(string $body): string
    {

        return $this->md->parse($body)->getContent();
    }
}
