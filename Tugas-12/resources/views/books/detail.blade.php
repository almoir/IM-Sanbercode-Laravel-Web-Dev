@extends("layouts.master")

@section("title")
Detail Book
@endsection

@section('contentTitle')
<a href="/books" class="btn btn-outline-primary">Go Back</a>
@endsection

@section('content')
    <h4>{{$books->title}}</h4>
    <img src="{{asset('upload/' . $books->image)}}" alt="..." style="height:200px;max-width:200px;">
    <p class="card-text">{{$books->summary}}</p>
    <p class="card-text"><small class="text-muted">Release Year {{$books->release_year}}</small></p>
    <p class="card-text"><small class="text-black">Stock: {{$books->stock}}</small></p>

    <hr>
    <h4 class="text-info">List Borrows</h4>
    @forelse ($books->listBorrows as $item)
        <div class="card mt-5">
            <div class="card-header">
                <Strong>{{$item->createdBy->name}}</Strong>
            </div>
            <div class="card-body">
                <Strong>Tanggal Peminjaman</Strong>
                <p class="card-text">{{$item->tanggal_peminjaman}}</p>
                <Strong>Tanggal Pengembalian</Strong>
                <p class="card-text">{{$item->tanggal_pengembalian}}</p>
            </div>
        </div>
        
    @empty
        <h4>Not Borrowed yet</h4>
    @endforelse
    <hr>
    @auth    
        <form action="/borrows/{{$books->id}}" method="post">
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
            @csrf
            <label>Tanggal Peminjaman</label>
            <br>
            <input type="date" name="tanggal_peminjaman">
            <br>
            <label>Tanggal Pengembalian</label>
            <br>
            <input type="date" name="tanggal_pengembalian">
            <br>
            <input type="submit" value="Borrow" class="btn btn-primary my-4">    
        </form>
    @endauth

@endsection