<?php

namespace App\Services;

use League\CommonMark\MarkdownConverter;
use App\Services\MarkdownServiceInterface;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Output\RenderedContentInterface;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\TaskList\TaskListExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;

class MarkDownService
{
    private array         $config = [
        'renderer' => [
            'block_separator' => "  \n",
            'inner_separator' => "\n",
            'soft_break'      => "\n",
        ],
        'html_input' => 'escape',
        'allow_unsafe_links' => false,
        'max_nesting_level' => 15,
    ];

    public function parse(string $text): RenderedContentInterface
    {
        $env = new Environment($this->config);
        $env->addExtension(new CommonMarkCoreExtension());
        $env->addExtension(new AutolinkExtension());
        $env->addExtension(new TaskListExtension());

        $converter = new MarkdownConverter($env);

        $body = (str_replace("<br />", "  ", nl2br($text)));

        return $converter->convert($body);
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
