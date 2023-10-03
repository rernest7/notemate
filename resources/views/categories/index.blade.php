@php
    $title = 'Categories';
@endphp
@extends('layouts.app')

@section('content')
    <div>
        <x-category-form route="categories.store" />
    </div>

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
