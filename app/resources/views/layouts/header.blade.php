<header>
    <nav>
        <div class="nav__container">
            <a href="/"><span class="link {{request()->is('/') ? 'is-active' : ''}}">Accueil</span></a>
            <div class="links">
                @if (auth()->check())
                <a href="/mon-compte ">
                    <span class="link {{request()->is('mon-compte') ? 'is-active' : ''}}">
                        Mon compte
                    </span>
                </a>
                <a href="/logout">
                    <span class="link {{request()->is('logout') ? 'is-active' : ''}}">
                        Deconnexion
                    </span>
                </a>
                @else
                <a href="/signin">
                    <span class="link {{request()->is('signin') ? 'is-active' : ''}}">
                        Créer un compte
                    </span>
                </a>
                <a href="/connexion">
                    <span class="link {{request()->is('connexion') ? 'is-active' : ''}}">
                        Connexion
                    </span>
                </a>
                @endif
            </div>
        </div>
    </nav>
</header>
