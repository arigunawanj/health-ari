@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Data Diri</div>
                    <div class="card-body">
                        <form action="{{ route('bmi.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tinggi Badan</label>
                                <input type="text" class="form-control" name="tinggi">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Berat Badan</label>
                                <input type="text" class="form-control" name="berat">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Hobi</label>
                                <input type="text" class="form-control" name="hobi">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Lahir</label>
                                <input type="text" class="form-control" name="tahun">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

                
               
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Hasil Data Diri</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Data Diri</th>
                                    <th scope="col">Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Isset Digunakan untuk pengecekan Data --}}
                                @isset($yeah)
                                    
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>{{ $yeah['nama'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tinggi Badan</th>
                                    <td>{{ $yeah['tinggi'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Berat Badan</th>
                                    <td>{{ $yeah['berat'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Umur</th>
                                    <td>{{ $yeah['tahun'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hobi</th>
                                    <td>{{ $yeah['hobi'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">BMI</th>
                                    <td>{{ $yeah['hasilbmi'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $yeah['statusbmi'] }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Konsultasi</th>
                                    <td>{{ $yeah['konsultasi'] }}</td>
                                </tr>
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
    @endsection
