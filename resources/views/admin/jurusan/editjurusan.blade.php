@section('headtitle', 'Edit Jurusan')
@section('page', 'Jurusan')
@section('subtitle', 'Edit Jurusan')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <form action="/updatejurusan/{{$getjurusan->id_jurusan}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Jurusan</h5><br>

                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Nama Jurusan</label>
                                <input class="form-control" name="nama" type="text" required value="{{$getjurusan->nama_jurusan}}">
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
                            <button class="btn teal" type="submit" name="submit">Edit Mapel</button>
                        </div>
                    </div>
                </div><br><br><br>
            </form>
        </div>
    </div>
</div>

@endsection