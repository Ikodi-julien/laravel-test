<header>
	<nav>
		<div class="nav__container">
			<div class="links">
				@include('partials.navbar-item', ['link' => '/', 'text' => 'Accueil'])
				@auth
					@include('partials.navbar-item', ['link' => auth()->user()->email, 'text' => auth()->user()->email])
				@endauth
			</div>
			<div class="links">
				@if (auth()->check())
					@include('partials.navbar-item', ['link' => 'mon-compte', 'text' => 'Mon compte'])
					@include('partials.navbar-item', ['link' => 'logout', 'text' => 'Deconnexion'])
				@else
					@include('partials.navbar-item', ['link' => 'signin', 'text' => 'Créer un compte'])
					@include('partials.navbar-item', ['link' => 'connexion', 'text' => 'Connexion'])
				@endif
			</div>
		</div>
	</nav>
</header>
