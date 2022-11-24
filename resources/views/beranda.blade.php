@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($article as $item)
                <div class="card ms-3" style="width: 25rem;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" alt="...">
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <div class="">
                            <p class="card-text"><span class="h6">Deskripsi :</span> {{ $item->isi }}</p>
                        </div>
                        <div class="">
                            <p class="text"><span class="h6">Tanggal Rilis :</span> {{ $item->tanggal }}</p>
                        </div>
                        <div class="">
                            <p class="card-text"><span class="h6">Penulis :</span> {{ $item->user->name }}</p>
                        </div>
                        <div class="">
                            <p class="card-text"><span class="h6">Kategori :</span>  {{ $item->category->nama }}</p>
                        </div>
                    </div>
                    <a href="/article" class="btn btn-primary">Ganti</a>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
