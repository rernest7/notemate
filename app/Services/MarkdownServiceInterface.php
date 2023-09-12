<?php

namespace App\Services;

use League\CommonMark\Output\RenderedContentInterface;

interface MarkdownServiceInterface
{
    public function parse(string $text): RenderedContentInterface;
}
