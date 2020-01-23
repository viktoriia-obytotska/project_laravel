<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\City;
use App\Owner;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidatorRequest;
use App\Services\BooksService;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {


        $publications = Publication::get();
        $authors = Author::get();

        return view('add books', compact('publications', 'authors'));
    }

    public function store(FormValidatorRequest $request, BooksService $service)
    {
        $service->save($request);
        $name = $request->input('name');
        $year = $request->input('year');
        $publication = $request->input('publication');
        $author = $request->input('author');


        $publications = Publication::get();
        $authors = Author::get();

        return view('add books', compact('publications', 'authors'));
    }

    public function show()
    {
        $items = DB::table('books')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoin('publications', 'books.publication_id', '=', 'publications.id')
            ->leftJoin('city', 'publications.city_id', '=', 'city.id')
            ->select('books.*', 'authors.*', 'publications.name', 'city.name')
            ->get();

        return view('saved books', compact('items'));

    }

    public function destroy($id)
    {
        $del = Book::find($id);
        $del->delete();

        return view('saved books');
    }

}
