<?php

namespace App\Http\Controllers;

use App\Http\Resources\SliderCollection;
use Illuminate\Http\Request;
use App\Http\Resources\BooksCollection;
use App\Book;
use App\Slider;

class BooksController extends Controller
{
    public function getMainScreenDataSource(Request $request)
    {

        return (new BooksCollection(Book::paginate(15)))
            ->additional(['meta' => [
                'code' => '200',
                'message' => 'Success'
            ]]);

    }

    public function getMainScreenSlider(Request $request)
    {

        return (new SliderCollection(Slider::all()))
            ->additional(['meta' => [
                'code' => '200',
                'message' => 'Success'
            ]]);

    }
}
