@php
    $title = $category->name;
@endphp
@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('categories.index') }}">(x) Close)</a>
    </div>

<div>
<form action="{{ route('categories.destroy', $category) }}" method="POST" onSubmit="confirm('All descendants will be deleted. Proceed?')">
        @csrf
        @method('DELETE')
        <button>Delete</button>
        </form>
        </div>

        <div>
            <h3>Edit this category</h3>
            <x-category-form route="categories.update" :category="$category" method="PUT" />
        </div>

        <h1>{{ $category->name }}</h1>
        <div>
            {{ $category->description }}
        </div>
        <hr />
        <div>
            <h2>Notes</h2>
            <div>
<a href="{{ route('notes.create', ['category' => $category]) }}">
Create new
</a>
            </div>
            @if (count($notes) < 1)
                <p>No notes</p>
            @else
                    
                    @foreach ($notes as $note)
<x-note-preview :note="$note" headingTag="h3" />
                    @endforeach

                {{ $notes->links() }}
            @endif
        </div>

        <div>
            <h2>Sub-Categories</h2>
            <div>
                @if (count($nodes))
                    @foreach ($nodes as $subcategory)
                        <x-category-card :category="$subcategory" />
                    @endforeach
                @else
                    <p>
                        No sub-categories.
                    </p>
                @endforelse
            </div>
        </div>
        <div>

            <x-category-form route="categories.store" :parent="$category" />
        </div>
    @endsection
