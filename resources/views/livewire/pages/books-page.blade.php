<div>
    <div x-data="{ deleteModal : false}" class="wrapper">
        <form wire:submit.prevent="addBook" class="grid grid-cols-2 gap-5 shadow-md lg:p-10">
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="name">Book Name</label>
                <input wire:model.defer="book.name" class="input-field" type="text" id="name">
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="author">Author</label>
                <input wire:model.defer="book.author" class="input-field" type="text" id="author">
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="description">Description</label>
                <textarea wire:model.defer="book.description" class="input-field lg:h-14" id="description"></textarea>
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="cover">Book Cover</label>
                <input wire:model="cover" class="input-field" type="file" id="cover"></input>
            </div>
            <div class="col-span-2 w-full flex justify-center py-5">
                <button class="py-3 px-16 border border-[#f9a828] rounded-md text-[#f9a828] hover:text-white hover:bg-[#f9a828] text-lg transition-all duration-500">Add Book</button>
            </div>
        </form>
        <div class="grid-display mt-10">
            <!-- Book Cover Section -->
            @foreach ($books as $book)
            <div x-data="{options_{{$book->id}} : false}"  class="shadow-md relative z-0">
                <div class="w-full h-72">
                    @if ($book->cover)
                    <img alt="{{$book->name}}" class="w-full h-full object-cover" src="{{ asset('storage/books/'.$book->cover) }}">
                    @else
                    <div class="h-full w-full bg-gray-600">
                    </div>
                    @endif
                </div>
                <div class="p-5 space-y-3">
                    <h1 class="text-lg">{{$book->name}}.</h1>
                    <h1>By: <span class="text-sm">{{$book->author}}</span></h1>
                    <!-- Action Buttons section -->
                    <div @click="options_{{$book->id}} = !options_{{$book->id}}" class="bg-gray-600 h-10 w-10 bg-opacity-70 hover:bg-opacity-50 transition-all duration-500 absolute top-0 right-2 rounded-full flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                        </svg>
                    </div>
                    <div x-show="options_{{$book->id}}" @click.away="options = false" class="bg-white absolute top-11 right-2 p-3 rounded-sm" x-cloak>
                        <ul class="space-y-2">
                            <li wire:click="editBook({{$book->id}})" @click="options = false">
                                <a class="hover:text-[#f9a828]" href="#">Edit</a>
                            </li>
                            <li>
                                <a @click="deleteModal = true, @this.set('bookId', {{$book->id}})" class="hover:text-[#f9a828]" href="#">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="w-full py-5 ">
            {{$books->links('pagination::tailwind')}}
        </div>

        <div x-show="deleteModal" class="fixed flex justify-center items-center h-screen w-screen bg-black bg-opacity-50 z-30 top-0 left-0 p-5 lg:p-0" x-cloak>
            <div @click.away="deleteModal = false" class="lg:w-1/3 bg-white rounded-md p-10 flex flex-col gap-3 justify-center items-center">
                <span class="w-full flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-12 h-12">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>

                </span>
                <p>
                    Are you sure you want to delete this item?
                </p>
                <div class="w-full flex justify-evenly">
                    <button wire:click="deleteItem" @click="deleteModal = false" class="py-4 w-28 border border-red-500 text-red-500 hover:bg-red-500 hover:text-white rounded-md">Delete</button>
                    <button @click="deleteModal = false" class="py-4 w-28 border border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white rounded-md">Cancel</button>

                </div>
            </div>
        </div>
    </div>
</div>