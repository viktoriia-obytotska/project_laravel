<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\City;
use App\Http\Requests\SearchValidatorRequest;
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
        $books = Book::select('books.*', 'authors.*', 'publications.name as pub_name', 'city.name as city_name')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoin('publications', 'books.publication_id', '=', 'publications.id')
            ->leftJoin('city', 'publications.city_id', '=', 'city.id')
            ->get();


        return view('saved books', compact('books'));

    }

    public function edit($id)
    {
        $books = Book::where('id', $id)->first();
        $publications = Publication::get();
        $authors = Author::get();

        return view('edit books', compact('books', 'publications', 'authors'));
    }

    public function update(FormValidatorRequest $request, BooksService $service, $id)
    {

        $service->update($request, $id);
        $name = $request->input('name');
        $year = $request->input('year');
        $publication = $request->input('publication');
        $author = $request->input('author');


        $publications = Publication::get();
        $authors = Author::get();

        return redirect()->route('saved_books', compact('publications', 'authors'));
    }

    public function destroy($id)
    {
        $books = Book::find($id);
        if (isset($books)) {
            $books->where('id', $id)->delete();
        }


        return view('saved books', compact('books'));
    }

    public function search(SearchValidatorRequest $request)
    {
        if ($query = $request->get('query')) {
            $builder = Book::select('books.*')->where('name', 'like', "%$query%");
        }
        if ($author = $request->get('query_aut')) {
            $query = $builder->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                ->where(function ($q) use ($author) {
                    $q->orWhere('authors.first_name', 'like', "%$author%")
                        ->orWhere('authors.surname', 'like', "%$author%")
                        ->orWhere('authors.last_name', 'like', "%$author%");
                });


            if ($publication = $request->get('query_pub')) {
                $query = $query->leftJoin('publications', 'books.publication_id', '=', 'publications.id')
                    ->orWhere('publications.name', 'like', "%$publication%");

                $results = $query->get();
                var_dump($results->toArray());
                die;
                return view('search books', compact('query', 'results'));
            } else {
                return view('search books');

            }
        }

    }
}
