@extends('layouts.app')
@section('content')
<section class="create_profil">
    <h1>Formulaire de création d'un compte</h1>
    <form action="/submit" method="post">
        {{ csrf_field() }}
        <div class="row">
            <label for="email">Email :</label>
            <input
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email')}}"
            >
            @if ($errors->has('email'))
                <p>Le champ "email" a une erreur : {{ $errors->first('email') }}</p>
            @endif
        </div>
        <div  class="row">

            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe">
            @if ($errors->has('password'))
                <p>Le champ "password" a une erreur : {{ $errors->first('password') }}</p>
            @endif
        </div>
        <div class="row">
            <label for="password_confirmation">Confirmation du mot de passe :</label>
            <input type="password" name="password_confirmation" placeholder="Confirmer mdp">
            @if ($errors->has('password_confirmation'))
                <p>Le champ "password_confirmation" a une erreur : {{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <input type="submit" value="M'inscrire">
    </form>
</section>
@endsection
