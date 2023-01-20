<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        $books = Book::query();

        $books = $books->paginate(15);
        return view('livewire.pages.home-page',compact('books'));
    }
}
