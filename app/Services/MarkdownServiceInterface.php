<?php

namespace App\Services;

use League\CommonMark\Output\RenderedContentInterface;
// @bug down D shoud be capital for consistency.
interface MarkdownServiceInterface
{
    public function parse(string $text): RenderedContentInterface;
}
