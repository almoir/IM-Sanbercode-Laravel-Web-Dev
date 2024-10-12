@extends('layouts.master')

@section('title')
    Edit Category
@endsection

@section('content')
<form action="/category/{{$category->id}}" method="POST">
    @method("put")
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
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="{{$category->name}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection