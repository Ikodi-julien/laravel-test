@extends('layouts.app')
@section('content')
    <h1>Utilisateurs</h1>

    @auth
        <h2>Les utilisateurs que je suis</h2>
        {{-- @if (auth()->user()->follows->isEmpty())
            Vous ne suivez aucun utilisateur
        @else --}}
            <ul>
                {{-- @foreach (auth()->user()->follows as $followed)
                <li><a href="/{{ $followed->email}}">{{ $followed->email}}</a></li>
                @endforeach --}}

                @forelse (auth()->user()->follows as $followed)
                <li><a href="/{{ $followed->email}}">{{ $followed->email}}</a></li>
                @empty
                Vous ne suivez aucun utilisateur
                @endforelse

            </ul>
        {{-- @endif --}}
    @endauth

    <h2>Tous les utilisateurs</h2>
    <ul>
        @foreach ($users as $user)
        <li><a href="/{{ $user->email}}">{{ $user->email}}</a></li>

        @endforeach
    </ul>
@endsection
