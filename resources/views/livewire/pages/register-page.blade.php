<div class="bg-gray-50">
    <x-header />
    <div class="h-screen w-full flex justify-center items-center">
        <div class="lg:w-1/3 mt-40 lg:mt-0">
            <form wire:submit.prevent="register" class="flex flex-col gap-5 p-10 bg-[#f9a828] shadow-md rounded-md">
                <div class="w-full flex justify-center text-2xl text-white">
                    <h1>
                        Registration Form
                    </h1>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="" for="name">Name</label>
                    <input wire:model.defer="name" type="text" class="p-2" id="name">
                    @error('name')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-3">
                    <label class="" for="email">Email</label>
                    <input wire:model.defer="email" type="email" class="p-2" id="email">
                    @error('email')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-3">
                    <label for="password">Password</label>
                    <input wire:model.defer="password" type="password" id="password" class="p-2">
                    @error('password')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col gap-3">
                    <label for="passwordConfirm">Confirm Password</label>
                    <input wire:model.defer="passwordConfirm" type="password" id="passwordConfirm" class="p-2">
                    @error('passwordConfirm')
                    <div class="text-sm text-red-600">
                        <h1>{{$message}}</h1>
                    </div>
                    @enderror
                </div>
                <div class="py-3 w-full flex items-center justify-between text-white">
                    <x-button btnName="Register"/>
                    <span>
                        <a href="{{route('login')}}">Login</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>