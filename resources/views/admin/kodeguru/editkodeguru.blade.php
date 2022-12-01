@section('headtitle', 'Edit Kode Guru')
@section('page', 'Kode Guru')
@section('subtitle', 'Edit Kode Guru')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <form action="/updatekode/{{$getkode->id_kode_guru}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Kode Guru</h5><br>

                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Kode Guru</label>
                                <input class="form-control" name="kode_guru" type="text" value="{{$getkode->kode_guru}}" required>
                                <div class=" materialize-red-text">
                                    @error('kode_guru')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="form-group">
                                <label>Guru</label>
                                <select class="form-control" name="guru_id">
                                    <option value="{{$getkode->guru_id}}">{{$getkode->nama_guru}}</option>
                                    @foreach($guru as $gr)
                                    <option value="{{$gr->id_guru}}">{{$gr->nama_guru}}</option>
                                    @endforeach
                                </select>
                                <div class=" materialize-red-text">
                                    @error('guru_id')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Mapel</label>
                                <select class="form-control" name="mapel_id">
                                    <option value="{{$getkode->mapel_id}}">{{$getkode->nama_mapel}}</option>
                                    @foreach($mapel as $mpl)
                                    <option value="{{$mpl->id_mapel}}">{{$mpl->nama_mapel}}</option>
                                    @endforeach
                                </select>
                                <div class=" materialize-red-text">
                                    @error('mapel_id')
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
                            <button class="btn teal" type="submit" name="submit">Tambah Kode Guru</button>
                        </div>
                    </div>
                </div><br><br><br>
            </form>
        </div>
    </div>
</div>

@endsection