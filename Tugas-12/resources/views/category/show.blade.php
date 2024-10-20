@extends('layouts.master')

@section('title')
    Categories
@endsection

@section('contentTitle')

<a href="/category/create" class="btn btn-outline-secondary">+ Category</a>
    
@endsection

@section('content')

<div class="card">
  <div class="card-header">
    Categories Name
  </div>
  <ul class="list-group list-group-flush">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($categories as $item)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$item->name}}</td>
      <td>
        <form action="/category/{{$item->id}}" method="POST">    
            <a href="/category/{{$item->id}}" class="btn btn-sm btn-info">Detail</a>
            <a href="/category/{{$item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
            @method("delete")
            @csrf
            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
      </form>
      </td>
    </tr>
    @empty
   <tr>
    <td>Data Empty</td>
   </tr>
    @endforelse
  </tbody>
</table>
  </ul>
</div>

@endsection