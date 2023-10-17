<header>
        <div style="height: 10vh" class="bg-dots-darker shadow  bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @guest
        <div style="height: 7vh" class="d-flex align-items-end w-100 justify-content-end">
            <a style="margin-right: 20px" href="/connexion">
                Se connecter
            </a>
            <a style="margin-right: 20px" href="/subscribe">
                S'inscrire
            </a>
        </div>    
        <div style="height: 3vh" class="d-flex align-items-end">
                <a style="margin-left: 10px" href="/">
                    Accueil
                </a>
            </div>
        @else
            <div style="height: 7vh" class="d-flex align-items-end w-100 justify-content-end">
            @auth
                <a style="margin-right: 20px" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth
            </div>    
            <div style="height: 3vh" class="d-flex align-items-end">
               
            </div>
        @endguest  
        </div>
</header>
