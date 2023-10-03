@php
$title = 'Your notes index';
@endphp
@extends('layouts.app')

@section('content')
<div>
<a href="{{ route('notes.create') }}">Create new</a>
<br/>
Or import from existing .txt:
<form method="POST" action="{{ route('notes.upload') }}" enctype="multipart/form-data">
@csrf
  <input type="file" id="noteFile" name="noteFile" required/>
<button>Upload</button>
</form>

</div>

<div>
<h3>Search</h3>
<form method="GET">
<input type="text" name="q" value="{{ request()->input('q') }}"/>
<button> Search</button>
</form>
</div>
<h1>notes ({{ $notesCount }}):</h1>

@if(!$notes)
<p>No notes yet</p>
@else
@foreach($notes as $note)

<x-note-preview :note="$note" headingTag="h2" />

@endforeach
{{ $notes->links() }}
@endif

@endsection