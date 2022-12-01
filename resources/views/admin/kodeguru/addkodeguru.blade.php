@section('headtitle', 'Tambah Kode Guru')
@section('page', 'Kode Guru')
@section('subtitle', 'Tambah Kode Guru')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <form action="/createkode" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Kode Guru</h5><br>

                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Kode Guru</label>
                                <input class="form-control" name="kode_guru" type="text" required>
                                <div class=" materialize-red-text">
                                    @error('kode_guru')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="form-group">
                                <label>Mapel</label>
                                <select class="form-control" name="mapel_id">
                                    <option value="">Pilih disini</option>
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
                        <div class="col s6">
                            <div class="form-group">
                                <label>Guru</label>
                                <select class="form-control" name="guru_id">
                                    <option value="">Pilih disini</option>
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
                        <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Pilih Guru</h5><br>
                        <div class="row tbl">
                            <style>
                                .tb th {
                                    text-align: center;
                                }
                            </style>
                            <table id="example" class="tb table-bordered">
                                <form action="">
                                    <thead>
                                        <tr style="text-align: center">
                                            <th>Pilih</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Kode</th>
                                            <th>Mata Pelajaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guru as $data)
                                        <tr>
                                            <td style="text-align: center">
                                                <label>
                                                    <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}" type="radio" value="{{ $data->id_kode_guru }}" required>
                                                    <span>A </span>
                                                    <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}" type="radio" value="{{ $data->id_kode_guru }}2" required>
                                                    <span>H </span>
                                                    <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}" type="radio" value="{{ $data->id_kode_guru }}3" required>
                                                    <span>I </span>
                                                    <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}" type="radio" value="{{ $data->id_kode_guru }}4" required>
                                                    <span>S </span>
                                                </label>
                                            </td>
                                            <td>{{ $data->nip }}1</td>
                                            <td>{{ $data->nama_guru }}</td>
                                            <td>{{ $data->kode_guru }}</td>
                                            <td>{{ $data->nama_mapel }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </form>
                            </table>
                        </div><br><br>
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