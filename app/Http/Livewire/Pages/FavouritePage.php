<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use Livewire\Component;

class FavouritePage extends Component
{
    public function render()
    {
        $books = Book::query();

        $books = $books->whereHas('userFavourites')->paginate(15);
        return view('livewire.pages.favourite-page', compact('books'));
    }
}
