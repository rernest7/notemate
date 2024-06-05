<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotesCRUDTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function note_can_be_created_and_returns_redirect(): void
    {
        $data = [
            'title' => 'Testing note',
            'body' => 'A new  test note.',
        ];

        $request = $this->post('/notes', $data);

        $request->assertStatus(302);

        $n = Note::first();
        $this->assertFalse(null === $n);
        $this->assertEquals($data['title'], $n->title);
    }

    /** @test */
    public function note_can_be_edited_and_returns_redirect()
    {
        $data = $this->data();

        $note = Note::create($data);

        $newData = [
            'title' => 'Updated note title',
            'body' => 'Updated note body',
        ];

        $request    = $this->put(route('notes.update', $note), $newData);
        $request->assertStatus(302);

        $newNote = Note::first();

        $this->assertEquals($note->id, $newNote->id);
        $this->assertEquals($newData['title'], $newNote->title);
    }

    /** @test */
    public function note_can_be_deleted()
    {
        $note = Note::create($this->data());

        $request = $this->delete('/notes/' . $note->id);

        $request->assertStatus(302);

        $this->assertTrue(0 === Note::count());
    }

    private function data(): array
    {
        return [
            'title' => 'Testing note',
            'body' => 'A new  test note.',
        ];
    }
}
