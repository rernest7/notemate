<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
@isset($title)
{{ $title }} - 
@endisset
        {{ config('app.name') }}
        </title>
    </head>
    <body>
        
        <div style="padding:1rem; max-width: 720px; width: 100%;">
            
@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Klaida!</h3>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            @yield('content')
        </div>
    </body>
</html>
