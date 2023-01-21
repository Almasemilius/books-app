<div class="">
    <!-- Books card section starts -->
    <div class="wrapper">
        <div class="grid-display">
            @foreach ($books as $book)
            <div x-data="{comment_{{$book->id}} : false, description_{{$book->id}} : false}" class="shadow-md">
                <!-- Book Cover Section -->
                <div class="w-full h-72">
                    @if ($book->cover)
                    <img alt="{{$book->name}}" class="w-full h-full object-cover" src="{{ asset('storage/books/'.$book->cover) }}">
                    @else
                    <div class="h-full w-full bg-gray-600">
                    </div>
                    @endif
                </div>
                <div class="p-5 space-y-3">
                    <h1 @click="description_{{$book->id}} = !description_{{$book->id}}" class="text-lg cursor-pointer">{{$book->name}}.</h1>
                    <h1>By: <span class="text-sm"> {{$book->author}}.</span></h1>

                    <div x-show="description_{{$book->id}}" class="w-full" x-cloak>
                        {{$book->description}}
                    </div>
                    <!-- Action Buttons section -->
                    <div class="flex justify-between ">
                        <div class="flex gap-5 lg:gap-3">
                            <div wire:click="likeBook({{$book->id}})" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="@if(auth()->user() && count($book->userLikes) > 0)
                                    fill-red-500
                                @endif h-6 lg:w-8 lg:h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                </svg>
                            </div>
                            <div @click="comment_{{$book->id}} = !comment_{{$book->id}}" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                                </svg>
                            </div>
                        </div>
                        <div wire:click="addToBookmark({{$book->id}})" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 lg:w-8 lg:h-8 @if(auth()->user() && count($book->userFavourites) > 0)
                                    fill-[#f9a828]
                                @endif">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                            </svg>
                        </div>
                    </div>

                    <div x-show="comment_{{$book->id}}" class="" x-cloak>
                        @if (count($book->comments) > 0)
                        <div class="w-full">
                            @foreach ($book->comments as $comment)
                            <div class="p-2">
                                <p>{{$comment->pivot->comment}}</p>

                            </div>
                            <hr>
                            @endforeach
                        </div>
                        @endif
                        <div class="w-full flex  items-center">
                            <input wire:model='comment' type="text" class="my-2 input-field bg-gray-200 rounded-full w-4/5">
                            <span wire:click="addComment({{$book->id}})" class="w-1/5 flex justify-center rounded-full cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-gray-700">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="w-full py-5 ">
            {{$books->links()}}
        </div>
    </div>
</div>