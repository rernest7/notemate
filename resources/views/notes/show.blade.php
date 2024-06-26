@php
$title = $note->title;
@endphp
@extends('layouts.app')
@section('content')
<div>
<a role="button" href="{{ route('notes.index') }}">&times; Close)</a>
<a href="{{ route('notes.edit', $note->id) }}">Edit</a>
<form onSubmit="confirm('Delete note?')" method="POST" action="{{ route('notes.destroy', $note->id) }}" style="display:inline;">
@csrf
@method('DELETE')
<button>Delete</button>
</form>
<a href="{{ route('notes.download', [$note->id, 'txt']) }}">Download</a>
</div>

<div>
In Category:
<A href="{{ route('categories.show', $note->category) }}">
{{ $note->category->name }}
</a>
</div>
<div>
Created {{ $note->created_at->diffForHumans() }} 
@if($note->updated_at > $note->created_at )
modified {{ $note->updated_at->diffForHumans() }}
@endif
</div>

<h1>{{ $note->title }}</h1>

<hr/>

<div>
{!! $note->body !!}
</div>
@endsection