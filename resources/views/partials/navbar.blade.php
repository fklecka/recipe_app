<nav class="flex justify-between px-4 bg-gray-200 items-center relative rounded-b-lg">
    <ul class="flex items-center">
        <li class="text-lg">Recipes</li>
        <li class="mr-16 ml-16">
            <form action="{{route('recipe.search')}}" method="GET">
                <input type="text" name="search" id="search" class="bg-transparent outline-none border-b border-gray-400 h-8 text-lg" placeholder="Suche">
            </form>
        </li>
    </ul>
    <ul class="flex items-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 h-full">  
        <a href="{{ route('home') }}" class="hover:bg-gray-300 px-3 h-full items-center justify-center flex hover:no-underline">
            <li class="flex items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                  </svg>
                  Home
            </li>
        </a>
        <a href="{{route('recipes.latest')}}" class="hover:bg-gray-300 px-3 h-full items-center justify-center flex hover:no-underline">
            <li class="flex items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                </svg>
                Neueste Rezepte
            </li>
        </a>
        <a href="{{route('categories.index')}}" class="hover:bg-gray-300 px-3 h-full items-center justify-center flex hover:no-underline">
            <li class="flex items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" />
                </svg>
                Kategorien
            </li>
        </a>
        @auth
        <a href="{{ route('recipes.create') }}" class="hover:bg-gray-300 px-3 h-full items-center justify-center flex hover:no-underline">
            <li class="flex items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                  </svg>
                Neues Rezept
            </li>
        </a>
        @endauth
    </ul>
    @guest
        <ul class="flex items-center">
            <a href="{{ route('login' )}}" class="hover:bg-gray-300 px-3 py-2 h-full items-center justify-center flex hover:no-underline">
                <li class="flex items-center flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Login
                </li>
            </a>
            <a href="{{ route('register') }}" class="hover:bg-gray-300 px-3 py-2 h-full items-center justify-center flex hover:no-underline">
                <li class="flex items-center flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" />
                        <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z" />
                      </svg>
                    Register
                </li>
            </a>
        </ul>
    @endguest
    @auth
    <ul class="flex items-center">
        <a href="{{route('account.index')}}" class="hover:bg-gray-300 py-2 px-3 h-full items-center justify-center flex hover:no-underline">
        <li class="flex items-center flex-col">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
              </svg>
              Mein Account
            </li>
        </a>
        <a class="hover:bg-gray-300 py-2 px-2 h-full items-center justify-center flex hover:no-underline" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <li class="flex items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                  </svg>
            Logout
            </li>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </ul>
    @endauth
</nav>