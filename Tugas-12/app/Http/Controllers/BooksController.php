<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Books;
use Illuminate\Support\Facades\File; 

class BooksController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::get();
        return view("books.index", ["books" => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::get(); 

        return view("books.create", ["category" => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validation
        $request->validate([
        'title' => 'required',
        'summary' => 'required',
        'release_year' => 'required',
        'stock' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg',
        'category_id' => 'required',
        ]);
        
        $fileName = "books".time().".".$request->image->extension();
        $request->image->move(public_path('upload/'), $fileName);


        $postBooks = new Books;
        
        $postBooks->title = $request->title;
        $postBooks->summary = $request->summary;
        $postBooks->release_year = $request->release_year;
        $postBooks->stock = $request->stock;
        $postBooks->image = $fileName;
        $postBooks->category_id = $request->category_id;

        $postBooks->save();

        return redirect("/books");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);
        return view('books.detail', ['books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Books::find($id);
        $category = Categories::get(); 

        return view('books.update', ['books'=>$books, 'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $request->validate([
        'title' => 'required',
        'summary' => 'required',
        'release_year' => 'required',
        'stock' => 'required',
        'image' => 'image|mimes:jpg,png,jpeg',
        'category_id' => 'required',
        ]);

        $books = Books::find($id);

        if ($request->has('image')) {

            File::delete('upload/'. $books->image);

            $fileName = "books".time().".".$request->image->extension();
            $request->image->move(public_path('upload/'), $fileName);
            
            $books->image = $fileName;
            $books->save();
        }

        $books->title = $request['title'];
        $books->summary = $request['summary'];
        $books->stock = $request['stock'];
        $books->category_id = $request['category_id'];

        $books->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        
        if ($books->image) {
            File::delete('upload/'. $books->image);
        }
        
        $books->delete();

        return redirect('/books');
    }
}
