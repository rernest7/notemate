<?php

namespace App\Services;

use League\CommonMark\MarkdownConverter;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class MarkdownService
{

    public function parse(string $text)
    {
        $config = [
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
            'max_nesting_level' => 15,
        ];

        $env = new Environment($config);
        $env->addExtension(new CommonMarkCoreExtension());
        $env->addExtension(new AutolinkExtension());

        $converter = new MarkdownConverter($env);

        return $converter->convert($text);
    }
}
