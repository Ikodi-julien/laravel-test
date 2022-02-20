@component('mail::message')
# Vous avez un nouveau follower

Il s'agit de {{$follower->email}}

@component('mail::button', ['url' => 'localhost:6500'])
Aller sur l'app
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
