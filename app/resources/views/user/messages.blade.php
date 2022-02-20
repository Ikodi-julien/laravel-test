@extends('layouts.app')
@section('content')
    <div class="section">
        <h1 class="title is-1">
            <span class="in-h1">{{ $user->email }}</span>
            @auth
                @if (auth()->user()->id !== $user->id)

                    <form action="/{{ $user->email }}/follow" method="post">
                        {{csrf_field()}}
                        @if (auth()->user()->isFollowing($user))
                            {{ method_field('delete')}}
                        @endif
                        <button type="submit">
                            @if (auth()->user()->isFollowing($user))
                                Ne plus suivre
                            @else
                                Suivre
                            @endif
                        </button>
                    </form>
                @endif
            @endauth
        </h1>


    @if (auth()->check() AND auth()->user()->id === $user->id)
    <form action="/messages" method="post">
        {{ csrf_field() }}

        <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" name="message" placeholder="Qu'avez-vous à dire ?"></textarea>
            </div>
            @if($errors->has('message'))
                <p class="help is-danger">{{ $errors->first('message') }}</p>
            @endif
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link" type="submit">Publier</button>
            </div>
        </div>
    </form>
    @endif
</div>

    @foreach ($user->messages as $message)
        <hr>
        <strong>{{ $message->created_at }}</strong>
        <p>
            {{ $message->content}}
        </p>
    @endforeach


@endsection
