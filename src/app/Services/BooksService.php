<?php

namespace App\Services;

use App\Book;

class BooksService
{
    public function save($request)
    {
        $books = new Book();
        $books->name = $request->name;
        $books->year = $request->year;
        $books->publication_id = $request->publication;
        $books->author_id = $request->author;

        $books->save;
    }
}
