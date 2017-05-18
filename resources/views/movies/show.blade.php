@extends('layouts.app')

@section('title', $movie->title)

@section('content')

<div class="container">
    <h1>{{ $movie->title }}</h1>

    <video src="{{ $movie->assetMovie() }}" height="100%" width="100%" controls></video>

    <div>
        @if ($movie->prev())
            <div class="pull-left">
                {{ link_to_route('movies.show', $movie->prev()->title, ['id' => $movie->prev()->id], ['class' => 'btn btn-prev']) }}
            </div>
        @endif
        @if ($movie->next())
            <div class="pull-right">
                {{ link_to_route('movies.show', $movie->next()->title, ['id' => $movie->next()->id], ['class' => 'btn btn-next']) }}
            </div>
        @endif
    </div>
</div>

@endsection
