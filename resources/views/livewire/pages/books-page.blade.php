<div>
    <x-admin-header />
    <div class="wrapper">
        <div class="grid grid-cols-2 gap-5 shadow-md p-5">
            <div class="input-group">
                <label for="name">Book Name</label>
                <input class="input-field" type="text" id="name">
            </div>
            <div class="input-group">
                <label for="author">Author</label>
                <input class="input-field" type="text" id="author">
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <textarea class="input-field lg:h-14" id="description"></textarea>
            </div>
            <div class="input-group">
                <label for="cover">Book Cover</label>
                <input class="input-field" type="file" id="cover"></input>
            </div>
            <div class="col-span-2 w-full flex justify-center py-5">
                <button class="py-3 px-16 border border-[#f9a828] rounded-md text-[#f9a828] hover:text-white hover:bg-[#f9a828] text-lg transition-all duration-500">Add Book</button>
            </div>
        </div>
        <div>

        
        </div>
    </div>
</div>