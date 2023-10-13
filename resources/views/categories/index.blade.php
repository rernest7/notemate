@php
    $title = 'Categories';
@endphp
@extends('layouts.app')

@section('content')
    <section aria-labelledby="create-form">
        <h1 id="create-form">Create a root category</h1>
        <x-category-form route="categories.store" />
    </section>

    <h1>categories({{ $categoriesCount }}):</h1>

    @if (!$categories)
        <p>No categories yet</p>
    @else
        @foreach ($categories as $category)
<x-category-card :category="$category" />
        @endforeach
        {{ $categories->links() }}
    @endif
@endsection
