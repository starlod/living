@extends('layouts.app')

@section('title', '動画一覧')

@section('app')

<h1>動画一覧</h1>

<div class="container">
    <video src="{{ asset('movies/jojo.mp4') }}" width="100%" controls></video>
</div>

@endsection
