@section('headtitle', 'Kode Guru')
@section('page', 'Pengajar')
@section('subtitle', 'Kode Guru')

@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">
                <div class="row m-r-10" style="text-align: right;">
                    <div class="col s12">                        
                        <a href="/addkode"><button type="button" class="btn  teal mb-3">Tambah kode guru</button></a>
                        <a href="/"><button type="button" class="btn  teal mb-3">Import kode Guru</button></a>                                              
                    </div>
                </div>
                <table id="example" class=" table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Guru</th>
                                <th>Kode</th>
                                <th>Mata Pelajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </tr>
                    </thead>                
                    <tbody>
                        @foreach($getkode as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->nip}}</td>
                            <td>{{$data->nama_guru}}</td>
                            <td>{{$data->kode_guru}}</td>
                            <td>{{$data->nama_mapel}}</td>
                            <td style="text-align: center;">
                                <a href="/editkode/{{ $data->id_kode_guru }}">
                                    <button type="button" class="btn btn-warning amber inline">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="#modal{{ $data->id_kode_guru }}" class="btn btn-danger red modal-trigger">                                    
                                    <i class="material-icons">delete</i>                                  
                                </a>
                            </td>
                        </tr>   
                        @endforeach              
                    </tbody>
                </table>
                @foreach($getkode as $data)
                <div id="modal{{ $data->id_kode_guru }}" class="modal">
                    <div class="modal-content">
                        <h4>Hapus Data Guru</h4>
                        <p>Apakah Anda yakin ingin Menghapus kode guru {{$data->kode_guru}} milik {{$data->nama_guru}} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/deletekode/{{ $data->id_kode_guru }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Hapus</a>
                    </div>
                </div> 
                @endforeach                
            </div>
        </div>
    </div>
</div>
@endsection

