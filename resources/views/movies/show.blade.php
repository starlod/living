@extends('layouts.app')

@section('title', $movie->title)

@section('content')

<h1>{{ $movie->title }}</h1>

<div class="container">
    <video src="{{ asset($movie->asset_path()) }}" height="100%" width="100%" controls></video>
</div>

@endsection
