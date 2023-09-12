@php
    $title = $note ? 'Edit note' : 'Create a new note';
@endphp
@extends('layouts.app')
@section('content')
    <div>
        <h1>
            {{ $title }}
        </h1>

        <form method="POST" action="{{ route('notes.store') }}">
            @csrf

            <input type="hidden" name="note_id" value="{{ $note ? $note->id : 0 }}" />

            <div>
                <label for="title">Title</label>
                <br />
                <input id="title" name="title" type="text" value="{{ $note ? $note->title : '' }}" />
            </div>

            <div>
                <label for="body">Body</label>
                <textarea id="body" name="body">
{{ $note ? $note->body : '' }}
</textarea>
            </div>

            <button>Save</button>
        </form>

    </div>
@endsection
