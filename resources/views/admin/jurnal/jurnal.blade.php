@section('headtitle', 'Jurnal')
@section('page', 'Pembelajaran')
@section('subtitle', 'Jurnal')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <form action="/filjurnal" method="post">
                    @csrf
                    <div class="row">
                        <div class="col s3">
                            <label for="">Tanggal Awal</label>
                            <input type="date" style="margin-top:3px" name="dari" class="form-control">
                        </div>
                        <div class="col s3">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" style="margin-top:3px" name="sampai" class="form-control">
                        </div>
                        <div class="col s2 m-t-30">
                            <input type="submit" class="btn teal" value="filter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">

                <table id="example" class="table-bordered">
                    <thead>

                        <tr>
                            <th class="p-l-20">Jurnal Mengajar</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach($getjurnal as $data)
                        <tr>
                            <td>
                                <div class="d-flex flex-row comment-row p-t-20 p-b-20 p-l-20 p-r-20">
                                    <div class="p-5"><img src="{{ asset('images-guru') }}/{{$data->foto_guru}}" alt="user" width="100" class="circle"></div>
                                    <div class="comment-text w-100">
                                        <h5 class="font-medium">{{$data->guru_nama}}</h5>

                                        <span style="font-weight: bold;">Mata pelajaran </span><span class="">{{$data->nama_mapel}}</span><br>
                                        <span class="" style="font-weight: bold;">Kelas </span><span>{{$data->kelas}} {{$data->nama_jurusan}} {{$data->no_kelas}}, </span>
                                        <!-- <span class="" style="font-weight: bold;">Materi </span><span>{{$data->deskripsi}}</span> -->
                                        <br><br>
                                        <div class="comment-footer">
                                            <span class="text-muted right">{{$data->tanggal}}</span> <a class="btn green btn-sm" href="/detailjurnal/{{$data->id_jurnal}}">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection