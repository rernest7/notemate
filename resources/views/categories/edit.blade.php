@php
    $title = 'Edit note';
@endphp
@extends('layouts.app')
@section('content')
    <div>
        <h1>
            {{ $title }}
        </h1>
        
        <x-note-form route="notes.update" method="PUT" :note="$note"/>
    
    </div>
@endsection
