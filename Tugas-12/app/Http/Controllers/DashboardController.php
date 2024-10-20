<?php

namespace App\Http\Controllers;
use App\Models\Books;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        $books = Books::get();
        return view("books.index", ["books" => $books]);
    }
}
