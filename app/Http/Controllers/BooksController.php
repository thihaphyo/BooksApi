<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BooksCollection;
use App\Book;

class BooksController extends Controller
{
    public function getMainScreenDataSource(Request $request){

        return (new BooksCollection(Book::paginate(15)))
                ->additional(['meta' => [
                    'code' => '200',
                    'message' => 'Success'
                ]]);

    }
}
