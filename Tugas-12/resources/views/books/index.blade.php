@extends('layouts.master')

@section('title')
    Books
@endsection

@section('contentTitle')
@auth
<a href="/books/create" class="btn btn-outline-secondary">+ Book</a>
@endauth
    
@endsection

@section('content')

<div class="row">
    @forelse ($books as $item)
    <div class="col-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="{{asset('upload/' . $item->image)}}" alt="..." style="height:200px;max-width:200px;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <strong>{{$item->title}}</strong>
                    <br>
                    <span class="badge badge-primary">{{$item->category->name}}</span>
                    <p class="card-text"><small class="text-muted">Release Year {{$item->release_year}}</small></p>
                    <p class="card-text">{{Str::limit($item->summary, 40)}}</p>
                    <a href="/books/{{$item->id}}" class="btn btn-dark">Details</a>
                    <p class="card-text"><small class="text-black">Stock: {{$item->stock}}</small></p>
                    @auth
                        
                    <div class="row">
                        <div class="col">
                            <a href="/books/{{$item->id}}/edit" class="btn btn-block btn-warning">Edit</a>
                        </div>
                        <div class="col">
                            <form action="/books/{{$item->id}}" method="POST">    
                                @method("delete")
                                @csrf
                                <input type="submit" class="btn btn-block btn-danger" value="Delete">
                            </form>
                        </div>
                    </div>
                    @endauth
                    </div>
                </div>
            </div>
         </div>
    </div>
   
    @empty
    <h2>No Book Found</h2>
    @endforelse
    
</div>

@endsection
