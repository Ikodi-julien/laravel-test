@extends('layouts.app')
@section('content')
    <h1>Les utilisateurs</h1>
    <ul>
        @foreach ($users as $user)
        <li><a href="/{{ $user->email}}">{{ $user->email}}</a></li>

        @endforeach
    </ul>
@endsection
