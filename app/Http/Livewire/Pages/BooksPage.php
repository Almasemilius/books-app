<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class BooksPage extends Component
{
    public function render()
    {
        return view('livewire.pages.books-page')->layout('layouts.admin');
    }
}
