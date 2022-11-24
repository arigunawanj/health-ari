@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a href="" data-bs-toggle="modal" data-bs-target="#tambahModal" class="btn btn-primary mb-3">Tambah
                    Data</a>
                <div class="card">
                    <div class="card-header">Data Kategori</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Isi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Pengguna</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($article as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->category->nama }}</td>
                                        <td><img src="{{ asset('storage/' . $item->foto) }}" width="200px" alt="" srcset=""></td>
                                        <td>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}" class="btn btn-warning">Edit</a>
                                            <a href="/article/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    {{-- Modal Edit --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('article.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label class="form-label">Judul</label>
                                                            <input type="text" class="form-control" value="{{ $item->judul }}" name="judul">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Isi</label>
                                                            <input type="text" class="form-control" value="{{ $item->isi }}" name="isi">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Tanggal</label>
                                                            <input type="date" class="form-control" value="{{ $item->tanggal }}" name="tanggal">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Kategori</label>
                                                            <select name="category_id" id="" class="form-select">
                                                                @foreach ($category as $data)
                                                                    <option value="{{ $data->id }}" @selected( $item->category_id == $data->id) >{{ $data->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Foto</label>
                                                            <input type="file" class="form-control" name="foto">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Foto Sebelumnya :</label>
                                                        </div>
                                                        <div class="mb-3">
                                                            <img src="{{ asset('storage/' . $item->foto) }}" width="200px" alt="" srcset="">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Isi</label>
                            <input type="text" class="form-control" name="isi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" id="" class="form-select">
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
