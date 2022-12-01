@section('headtitle', 'Jadwal')
@section('page', 'Pembelajaran')
@section('subtitle', 'Jadwal')

@extends('layouts.master')

@section('content')
<div class="">
    <div class="row">
        <div class="col l12 m8">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title">Filter</h5><br>
                    <form action="/filjadwal" method="post">
                        @csrf
                        <div class="col-12">
                            <div class="row">
                                <div class="col s2">
                                    <div class="form-group">
                                        <label>kelas</label>
                                        <select class="form-control" name="kelas">
                                            <option value="">Pilih</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s2">
                                    <div class="form-group">
                                        <label>No</label>
                                        <select class="form-control" name="no_kelas">
                                            <option value="">Pilih</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col s4">
                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select class="form-control" name="jurusan">
                                            <option value="">Pilih Disini</option>
                                            @foreach($getjurusan as $jurusan)
                                            <option value="{{$jurusan->id_jurusan}}">{{$jurusan->nama_jurusan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col s1 m-t-30 m-b-25">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-md indigo col-12" value="Filter">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row m-t-20 m-l-5" style="text-align: left;">
                        <div class="col-sm-12">
                            <a href="/addjadwal">
                                <button class="btn teal">Tambah Jadwal</button>
                            </a>
                        </div>
                    </div><br>
                </div>
            </div>
        </div>
    </div>
</div>
@if($kelas == true)
<div class="row m-t-20">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">
                <table id="example" class=" table table-bordered display">
                    <thead>
                        <tr>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @for($a = 0; $a < 5; $a++ ) <tr>
                            <td>
                                <table>
                                    <tr style="border:none;">
                                        <td style="border:none;">{{$nomor++}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <tr style="border:none;">
                                        <td style="border:none;">{{$seminggu[0][$a]}}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <table>
                                    @for($b = 0; $b < count($jadwalkelas[0][$a]); $b++) <tr style="border:none;">
                                        <td style="border:none;">
                                            {{$jadwalkelas[0][$a][$b]->nama_mapel}}
                                        </td>
                                        </tr>
                                        @endfor
                                </table>
                            </td>
                            <td>
                                <table>
                                    @for($b = 0; $b < count($jadwalkelas[0][$a]); $b++) <tr style="border:none;">
                                        <td style="border:none;">
                                            {{$jadwalkelas[0][$a][$b]->nama_guru}}
                                        </td>
                                        </tr>
                                        @endfor
                                </table>
                            </td>
                            <td>
                                <table>
                                    @for($b = 0; $b < count($jadwalkelas[0][$a]); $b++) <tr style="border:none;">
                                        <td style="border:none;">
                                            {{$jadwalkelas[0][$a][$b]->jam_mulai}} - {{$jadwalkelas[0][$a][$b]->jam_selesai}}
                                        </td>
                                        </tr>
                                        @endfor
                                </table>
                            </td>
                            <td>
                                <table style="border:none;">
                                    @for($b = 0; $b < count($jadwalkelas[0][$a]); $b++) <tr style="border:none;">
                                        <td style="border:none;text-align: center;">
                                            <a href="/dataguruedit/{{$jadwalkelas[0][$a][$b]->id_jadwal}}" class="amber-text">
                                                Edit
                                            </a> -
                                            <a href="#modal{{$jadwalkelas[0][$a][$b]->id_jadwal}}" class="red-text modal-trigger">
                                                Delete
                                            </a>
                                        </td>
                                        </tr>
                                        @endfor
                                </table>
                            </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                @foreach($getjadwal as $data)
                <div id="modal{{ $data->id_jadwal }}" class="modal">
                    <div class="modal-content">
                        <h4>Hapus Data Guru</h4>
                        <p>Apakah Anda yakin ingin Menghapus Jadwal {{$data->nama_mapel}} di kelas {{$data->kelas}} {{$data->nama_jurusan}} {{$data->no_kelas}} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/datagurudelete/{{ $data->id_jadwal }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Hapus</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif

@endsection