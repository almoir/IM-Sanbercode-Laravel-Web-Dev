<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function create(){
        return view("category.add");
    }

    public function store(Request $request){

        // Validation
        $request->validate([
        'name' => 'required|min:2',
        ]);

        // Insert Data to DB
        DB::table('categories')->insert([
        'name' => $request->input('name'),
        ]);

        return redirect('/category');
    }

    public function index(){
        $categories = DB::table('categories')->get();

        return view('category.show', ['categories'=> $categories]);
    }

    public function detail($id){
        $category = Categories::find($id);

        return view('category.detail', ['category' => $category]);
    }

    public function edit($id){
        $category = DB::table('categories')->find($id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id){
         $request->validate([
        'name' => 'required|min:2',
        ]);

        DB::table('categories')
        ->where('id', $id)
        ->update(
            [
                'name' => $request->input('name')
            ]
        );
        
        return redirect('/category');
    }

    public function destroy($id){
        DB::table('categories')->where('id', '=', $id)->delete();

        return redirect('/category');
    }
}
