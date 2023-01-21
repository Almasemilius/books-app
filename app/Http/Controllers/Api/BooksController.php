<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function getBooks(Request $request)
    {
        $limit = $request->limit;
        $category = $request->category;
        $data = Book::query();

        if($category && ($category == 'popular')){
            $data->withCount('likes')->orderBy('likes_count','desc');
        }

        $data = $data->paginate($limit ? $limit : 25);

        // return $category;

        return response()->json($data);
    }
}
