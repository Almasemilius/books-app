<?php

namespace App\Http\Livewire\Pages;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class HomePage extends Component
{
    use WithPagination;
    public $comment;
    
    public function likeBook(Book $book)
    {
        if (auth()->user()) {
            $like = DB::table('likes')->where('user_id', auth()->user()->id)
                ->where('book_id', $book->id)->first();
            if ($like) {
                $book->likes()->detach(auth()->user());
            } else {
                $book->likes()->attach(auth()->user());
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function addToBookmark(Book $book)
    {
        if (auth()->user()) {
            $favourite = DB::table('favourites')->where('user_id', auth()->user()->id)
                ->where('book_id', $book->id)->first();
            if ($favourite) {
                $book->favourite()->detach(auth()->user());
            } else {
                $book->favourite()->attach(auth()->user());
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function addComment(Book $book)
    {
        if (auth()->user()) {
            $comment = DB::table('comments')->where('user_id', auth()->user()->id)
                ->where('book_id', $book->id)->first();
            if ($this->comment && !$comment) {
                $book->comments()->attach(auth()->user(), ['comment' => $this->comment]);
                $this->comment = "";
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $books = Book::query();

        if (auth()->user()) {
            $data['books'] = $books->with('userLikes', 'userFavourites','comments')->paginate(15);
        }
        // dd($data['books']);
        $data['books'] = $books->paginate(15);


        // dd($data);
        return view('livewire.pages.home-page', $data);
    }
}
