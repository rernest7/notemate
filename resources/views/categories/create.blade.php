@php
    $title = 'Create a new note';
@endphp
@extends('layouts.app')
@section('content')
    <div>
        <h1>
            {{ $title }}
        </h1>
        
        <x-note-form route="notes.store" />
    
    </div>
@endsection
