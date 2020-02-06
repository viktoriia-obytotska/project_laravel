<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
use App\Book;

class BookController extends Controller
{
    public function index()
    {
        return new BookResource(Book::first());
    }

    public function store(BookRequest $request)
    {
        $books = new Book();
        $books->name = $request->name;
        $books->year = $request->year;
        $books->author = $request->author;
        $books->publication = $request->publication;
        $books->save();

        return new BookResource($books);
    }

    public function show($id)
    {
        return new BookResource(Book::find($id));
    }

    public function update(BookRequest $request, $id)
    {
        $books = Book::find($id);
        $books->name = $request->name;
        $books->year = $request->year;
        $books->author = $request->author;
        $books->publication = $request->publication;
        $books->save();

        return new BookResource($books);
    }

    public function destroy($id)
    {
        $books = Book::find($id);
        $books->delete();

        return new BookResource($books);
    }
}
