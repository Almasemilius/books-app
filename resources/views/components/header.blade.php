<nav class="bg-white h-20 lg:h-32 w-full flex items-center shadow-md fixed z-20">
    <div class="px-10 flex items-center justify-between w-full z-20">
        <div class="h-16 w-16 md:h-20 md:w-20 lg:h-28 lg:w-28">
            <img src="{{asset('assets/logo.png')}}" alt="">
        </div>
        <div class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="" class="w-10 h-10 lg:w-16 lg:h-16 stroke-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

        </div>
        <ul class="hidden lg:flex gap-10">
            <li>
                <a class="hover:text-[#f9a828] @if (Route::is('home'))
                text-[#f9a828]
                @endif transition-all duration-500" href="{{route('home')}}">Home</a>
            </li>
            <li>
                <a class="hover:text-[#f9a828] @if (Route::is(''))
                    
                @endif transition-all duration-500" href="#">Favourite</a>
            </li>
            <li>
                @if (empty(auth()->user()))
                <a class="hover:text-[#f9a828] @if (Route::is('login'))
                text-[#f9a828]
                @endif transition-all duration-500" href="{{route('login')}}">Login</a>
                @else
                <a class="hover:text-[#f9a828] @if (Route::is('login'))
                text-[#f9a828]
                @endif" href="{{route('logout')}}">Logout</a>
                @endif
            </li>

        </ul>
    </div>
</nav>