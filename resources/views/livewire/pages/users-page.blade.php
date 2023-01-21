<div>
    <div x-data="{deleteModal:false}" class="wrapper">
        <form wire:submit.prevent="updateUser({{$user->id}})" class="grid grid-cols-2 gap-5 shadow-md lg:p-10">
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="name">User Name</label>
                <input wire:model.defer="user.name" class="input-field" type="text" id="name">
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="author">Email</label>
                <input wire:model.defer="user.email" class="input-field" type="text" id="author">
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="role">Role</label>
                <select wire:model.defer="user.role" class="input-field lg:h-14" id="role">
                    <option value=""></option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="input-group col-span-2 lg:col-span-1">
                <label for="password">Password</label>
                <input wire:model="password" class="input-field" type="text" id="password"></input>
            </div>
            <div class="col-span-2 w-full flex justify-center py-5">
                <button @if (!$user->id)
                    disabled
                    @endif class="py-3 px-16 border border-[#f9a828] rounded-md text-[#f9a828] hover:text-white hover:bg-[#f9a828] text-lg transition-all duration-500">Update</button>
            </div>
        </form>
        <div class="mt-10 shadow-md">
            <table class="tbl">
                <thead class="">
                    <tr class="t-head">
                        <th class="">
                            S/N
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            Role
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr class="text-center">
                        <td>
                            {{$key + 1}}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->role}}
                        </td>
                        <td>
                            <div class="flex justify-evenly">
                                <span>
                                    <a wire:click="editUser({{$user->id}})" href="#">Edit</a>
                                </span>
                                <span>
                                    <a @click="deleteModal = true , @this.set('userId',{{$user->id}})" class="text-red-400 hover:text-red-700" href="#">Delete</a>
                                </span>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="w-full py-5 ">
                {{$users->links()}}
            </div>
        </div>
        <div x-show="deleteModal" class="fixed flex justify-center items-center h-screen w-screen bg-black bg-opacity-50 z-30 top-0 left-0" x-cloak>
            <div @click.away="deleteModal = false" class="w-1/3 bg-white rounded-md p-10 flex flex-col gap-3 justify-center items-center">
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