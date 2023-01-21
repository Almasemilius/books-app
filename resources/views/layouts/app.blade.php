<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    @livewireStyles
</head>

<body x-data="{drawer : false}" class="">
    <x-header />

    {{$slot}}
    <div x-show="drawer" class="h-screen w-screen bg-[#f9a828] fixed top-0 z-30" x-transition:enter.duration.500ms x-transition:leave.duration.400ms x-cloak>
        <div @click="drawer = false" class="p-5 w-full flex justify-end">
            <span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        <div>
            <ul class="text-3xl w-full flex flex-col items-center gap-20 py-20">
                <li @click="drawer = false">
                    <a class="@if (Route::is('home'))
                text-white
                @endif transition-all duration-500" href="{{route('home')}}">Home</a>
                </li>
                <li @click="drawer = false">
                    <a class="@if (Route::is('favourites'))
                    
                    @endif transition-all duration-500" href="{{route('favourites')}}">Favourite</a>
                </li>
                <li @click="drawer = false">
                    @if (empty(auth()->user()))
                    <a class="@if (Route::is('login'))
                text-white
                @endif transition-all duration-500" href="{{route('login')}}">Login</a>
                    @else
                    <a class="@if (Route::is('login'))
                text-white
                @endif" href="{{route('logout')}}">Logout</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
    @livewireScripts
</body>

</html>