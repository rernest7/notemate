<?php

namespace App\Services;

use League\CommonMark\MarkdownConverter;
use App\Services\MarkdownServiceInterface;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Output\RenderedContentInterface;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class MarkdownService implements MarkdownServiceInterface
{
    private array         $config = [
        'html_input' => 'escape',
        'allow_unsafe_links' => false,
        'max_nesting_level' => 15,
    ];

    public function parse(string $text): RenderedContentInterface
    {
        $env = new Environment($this->config);
        $env->addExtension(new CommonMarkCoreExtension());
        $env->addExtension(new AutolinkExtension());

        $converter = new MarkdownConverter($env);

        return $converter->convert($text);
    }

    public function overwriteConfig(array $config): void
    {
        $this->config = $config;
    }

    public function addToConfig(string $key, mixed $value): void
    {
        $this->config[$key] = $value;
    }
}
