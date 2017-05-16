@extends('layouts.app')

@section('title', '動画一覧')

@section('content')

<div class="container">
    <h1>動画一覧</h1>

    <ul>
        @foreach ($movies as $movie)
            <li>{{ link_to_route('movies.show', $movie->title, [$movie->id]) }}</li>
        @endforeach
    </ul>
</div>

@endsection
