<?php

namespace App\Services;



interface MarkdownServiceInterface
{
    public function parse(string $text);
}
