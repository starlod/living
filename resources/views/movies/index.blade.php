@extends('layouts.app')

@section('title', '動画一覧')

@section('content')

<div class="container">

    @if ($movies->count() > 0)

        <h1>動画一覧</h1>

        <ol>
            @foreach ($movies as $movie)
                <li>{{ link_to_route('movies.show', $movie->title, [$movie->id]) }}</li>
            @endforeach
        </ol>

    @else

        <p>動画がありません。</p>

    @endif
</div>

@endsection
