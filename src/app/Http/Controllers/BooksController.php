<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Requests\FormValidatorRequest;
use App\Services\BooksService;

class BooksController extends Controller
{
    public function index()
    {
        return view('add books');

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

}
