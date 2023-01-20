<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use Livewire\Component;

class BooksPage extends Component
{
    public Book $book;
    protected $rules = [
        'book.name' => 'required',
        'book.description' => 'required',
        'book.cover' => 'nullable',
        'book.author' => 'required',
    ];
    public $cover;
    public $bookId;

    public function mount()
    {
        $this->book = new Book();
    }

    public function editBook(Book $book)
    {
        $this->book = $book;
    }

    public function addBook()
    {
        $this->book->save();
        $this->book = new Book();
    }

    public function deleteItem()
    {
        $book = Book::findOrFail($this->bookId);
        $book->delete();
    }
    public function render()
    {
        $books = Book::query();

        $books = $books->paginate(10);
        return view('livewire.pages.books-page',compact('books'))->layout('layouts.admin');
    }
}
