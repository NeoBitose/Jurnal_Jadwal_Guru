@section('headtitle', 'Tambah Jurusan')
@section('page', 'Jurusan')
@section('subtitle', 'Tambah Jurusan')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <form action="/createjurusan" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Jurusan</h5><br>

                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Nama Jurusan</label>
                                <input class="form-control" name="nama" type="text" required>
                                <div class=" materialize-red-text">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col s5">
                            <button class="btn teal" type="submit" name="submit">Tambah Mapel</button>
                        </div>
                    </div>
                </div><br><br><br>
            </form>
        </div>
    </div>
</div>

@endsection