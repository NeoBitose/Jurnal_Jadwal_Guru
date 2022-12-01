@section('headtitle', 'Tambah Jadwal')
@section('page', 'Jadwal')
@section('subtitle', 'Tambah Jadwal')

@extends('layouts.master')

@section('content')
    <style>
        .btn-group {
            display: none
        }

    </style>
    <div class="row">
        <div class="col s12">
            <div class="card">
                <form action="/createjadwal" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-content">
                        <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Pilih Kelas</h5><br>
                        <div class="row">
                            <div class="col s3">
                                <div class="form-group">
                                    <label>Kelas</label>
                                    <select class="form-control" name="kelas" required>
                                        <option value="10">10</option>
                                        <option value="11">11 </option>
                                        <option value="12">12</option>
                                    </select>
                                    <div class=" materialize-red-text">
                                        @error('kelas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="jurusan">
                                        @foreach ($getjurusan as $jurusan)
                                            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class=" materialize-red-text">
                                        @error('jurusan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="form-group">
                                    <label>Nomer Kelas</label>
                                    <select class="form-control" name="no_kelas">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                    <div class=" materialize-red-text">
                                        @error('no_kelas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <br><br><br>

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
                                        @foreach ($getkode as $data)
                                            <tr>
                                                <td style="text-align: center">
                                                    <label>
                                                        <input class="with-gap" name="kode_guru" id="{{ $data->id_kode_guru }}" type="radio" value="{{ $data->id_kode_guru }}" required>
                                                        <span> </span>
                                                    </label>
                                                </td>
                                                <td>{{ $data->nip }}</td>
                                                <td>{{ $data->nama_guru }}</td>
                                                <td>{{ $data->kode_guru }}</td>
                                                <td>{{ $data->nama_mapel }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </form>
                            </table>
                        </div><br><br>

                        <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Pengaturan waktu</h5><br>
                        <div class="row">
                            <div class="col s4">
                                <div class="form-group">
                                    <label>Hari</label>
                                    <select class="form-control" name="hari">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa </option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                    </select>
                                    <div class=" materialize-red-text">
                                        @error('kelas')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="form-group">
                                    <label>Waktu mulai</label>
                                    <input type="time" name="mulai" class="form-control" required>
                                    <div class=" materialize-red-text">
                                        @error('mulai')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col s4">
                                <div class="form-group">
                                    <label>Nomer Kelas</label>
                                    <input type="time" name="akhir" class="form-control" required>
                                    <div class=" materialize-red-text">
                                        @error('akhir')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            
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
