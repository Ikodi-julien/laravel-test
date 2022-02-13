@extends('layouts.app')
@section('content')
    <form action="/submit" method="post">
        {{ csrf_field() }}
        <input
            type="email"
            name="email"
            placeholder="Email"
            value="{{ old('email')}}"
        >
        @if ($errors->has('email'))
            <p>Le champ "email" a une erreur : {{ $errors->first('email') }}</p>
        @endif
        <input type="password" name="password" placeholder="Mot de passe">
        @if ($errors->has('password'))
            <p>Le champ "password" a une erreur : {{ $errors->first('password') }}</p>
        @endif
        <input type="password" name="password_confirmation" placeholder="Confirmer mdp">
        @if ($errors->has('password_confirmation'))
            <p>Le champ "password_confirmation" a une erreur : {{ $errors->first('password_confirmation') }}</p>
        @endif
        <input type="submit" value="M'inscrire">
    </form>
@endsection
