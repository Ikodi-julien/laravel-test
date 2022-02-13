@extends('layouts.app')
@section('content')
    <h1>Les utilisateurs</h1>
    <ul>
        @foreach ($users as $user)
        <li>{{ $user->email}}</li>

        @endforeach
    </ul>
@endsection
