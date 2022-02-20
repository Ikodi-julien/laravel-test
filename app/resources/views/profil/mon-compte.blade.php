@extends('layouts.app')
@section('content')
<section>
    <figure>
        <img src="/storage/{{ auth()->user()->avatar}}" alt="mon avatar">
    </figure>
    <h1>Mon compte</h1>

    <hr>
    <form action="/modification-avatar" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="field">
            <label>Nouvel Avatar</label>
            <div class="control">
                <input class="input" type="file" name="avatar">
            </div>
            @if($errors->has('avatar'))
                <p class="help is-danger">{{ $errors->first('avatar') }}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Modifier mon avatar</button>
            </div>
        </div>
    </form>

    <hr>

    <form action="/modification-mot-de-passe" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label>Nouveau mot de passe</label>
            <div class="control">
                <input class="input" type="password" name="password">
            </div>
            @if($errors->has('password'))
                <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="field">
            <label>Mot de passe (confirmation)</label>
            <div class="control">
                <input class="input" type="password" name="password_confirmation">
            </div>
            @if($errors->has('password_confirmation'))
                <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Modifier mon mot de passe</button>
            </div>
        </div>
    </form>

</section>
@endsection
