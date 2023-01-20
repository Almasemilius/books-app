<div class="bg-gray-50">
    <x-header />
    <div class="h-screen w-full flex justify-center items-center">
        <div class="lg:w-1/3">
            <form wire:submit.prevent="login" class="flex flex-col gap-5 p-10 bg-[#f9a828] shadow-md rounded-md">
                <div class="w-full flex justify-center text-2xl text-white">
                    <h1>
                        Login Form
                    </h1>
                </div>
                <div class="input-group">
                    <label class="" for="email">Email</label>
                    <input wire:model.defer="email" type="email" class="p-2" id="email">
                    @error('email')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input wire:model.defer="password" type="password" class="p-2">
                    @error('password')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div>
                    @error('failed-auth')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="py-3 w-full flex justify-between items-center text-">
                    <x-button btnName="Login" />
                    <span class="text-white">
                        <a href="{{route('register')}}">Register</a>
                    </span>
                </div>
            </form>
        </div>
    </div>


</div>