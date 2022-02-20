@extends('layouts.app')
@section('content')
    <section class="section">
        <h1 class="title is-1">News</h1>

        @foreach ($messages as $message)
            <hr>
            <strong>{{ $message->created_at }}</strong>
            <p>
                {{ $message->content}}
            </p>
        @endforeach
    </section>
@endsection
