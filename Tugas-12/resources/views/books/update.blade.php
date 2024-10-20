@extends('layouts.master')

@section('title')
    Update Books
@endsection

@section('content')
<form action="/books/{{$books->id}}" method="POST" enctype="multipart/form-data">
    {{-- Validation --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Input Form --}}
    @csrf
    @method('put')
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" value="{{$books->title}}">
    </div>
    <div class="form-group">
        <label>Summary</label>
        <textarea class="form-control" name="summary" cols="30" rows="10">{{$books->summary}}</textarea>
    </div>
    <div class="form-group">
        <label>Release Year</label>
        <input type="number" class="form-control" name="release_year" min="1900" max="2099" step="1" value="2024" value="{{$books->release_year}}">
    </div>
    <div class="form-group">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" value="{{$books->stock}}">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <option value="">--Select Category--</option>
           
            @forelse ($category as $item)
             @if ($item->id === $books->category_id)
                
             <option value="{{$item->id}}" selected>{{$item->name}}</option>
             @else
             <option value="{{$item->id}}">{{$item->name}}</option>
                
            @endif
            @empty
                <option >No Category Data</option>
            @endforelse
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection