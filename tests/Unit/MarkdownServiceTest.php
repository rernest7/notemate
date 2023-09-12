<?php

namespace Tests\Unit;

use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use App\Services\MarkdownService;
use League\CommonMark\Output\RenderedContentInterface;

class MarkdownServiceTest extends TestCase
{
    /** @test */
    public function text_gets_converted()
    {
        $text = "# Overview \n
    The overview defines something";

        $md = new MarkdownService();
        $text = $md->parse($text);
        $this->assertTrue($text instanceof RenderedContentInterface);

        $contains = Str::contains($text->getContent(), 'h1');
        $this->assertSame(true, $contains);
    }
}
