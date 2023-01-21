<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class BooksPage extends Component
{
    use WithFileUploads;
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
        if ($this->cover) {
            $this->cover->store('public/books');
            $this->book->cover = $this->cover->hashName();
        }
        $this->book = $book;
        $this->cover = '';
    }

    public function addBook()
    {
        if ($this->cover) {
            $this->cover->store('public/books');
            $this->book->cover = $this->cover->hashName();
        }
        $this->book->save();
        $this->book = new Book();
        $this->cover = '';
    }

    public function deleteItem()
    {
        $book = Book::findOrFail($this->bookId);
        Storage::delete($book->cover);
        $book->delete();

    }
    public function render()
    {
        $books = Book::query();

        $books = $books->paginate(10);
        return view('livewire.pages.books-page', compact('books'))->layout('layouts.admin');
    }
}
