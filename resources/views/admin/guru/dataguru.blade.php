@section('headtitle', 'Data Guru')
@section('page', 'Pengajar')
@section('subtitle', 'Data Guru')

@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">
                @if ($status == true)
                <div class="row m-r-10" style="text-align: right;">
                    <div class="col s12">
                        <a href="/addguru"><button type="button" class="btn  teal mb-3">Tambah Guru</button></a>
                        <a href="/dapilcreate"><button type="button" class="btn  teal mb-3">Import Guru</button></a>
                    </div>
                </div>
                @endif
                <table id="example" class=" table table-striped table-bordered display">
                    <thead>
                        <tr>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getguru as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nip }}</td>
                            <td>{{ $data->nama_guru }}</td>
                            <td>{{ $data->username }}</td>
                            <td style="text-align: center;">
                                @if ($status == true)
                                <a href="/editguru/{{ $data->id_guru }}">
                                    <button type="button" class="btn btn-warning amber inline">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="#modal{{ $data->id_guru }}" class="btn btn-danger red modal-trigger">
                                    <i class="material-icons">delete</i>
                                </a>
                                @endif

                                @if ($status == false)
                                <a href="#modalnon{{ $data->id_guru }}" class="btn btn-danger red modal-trigger">
                                    Aktifkan
                                </a>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ($getguru as $data)
                <div id="modal{{ $data->id_guru }}" class="modal">
                    <div class="modal-content">
                        <h4>Hapus Data Guru</h4>
                        <p>Apakah anda yakin ingin menghapus guru {{ $data->nama_guru }} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/deleteguru/{{ $data->id_guru }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Hapus</a>
                    </div>
                </div>
                @endforeach
                @foreach ($getguru as $data)
                <div id="modalnon{{ $data->id_guru }}" class="modal">
                    <div class="modal-content">
                        <h4>Aktifkan Data Guru</h4>
                        <p>Apakah anda yakin ingin mengaktifkan guru {{ $data->nama_guru }} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/aktifguru/{{ $data->id_guru }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Aktifkan</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection