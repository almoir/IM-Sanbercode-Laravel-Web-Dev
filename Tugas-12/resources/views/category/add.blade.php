@extends('layouts.master')

@section('title')
    Create Category
@endsection

@section('content')
<form action="/category" method="POST">
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
    <input type="text" class="form-control" name="name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection