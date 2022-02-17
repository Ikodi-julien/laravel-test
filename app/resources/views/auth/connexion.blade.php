@extends('layouts.app')
@section('content')
<section class="create_profil">
    <h1>Formulaire de connexion</h1>
    <form action="" method="post">
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

        <input type="submit" value="Connexion">
    </form>
</section>
@endsection
