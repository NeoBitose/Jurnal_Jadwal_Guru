@section('headtitle', 'Jurusan')
@section('page', 'Siswa')
@section('subtitle', 'Jurusan')

@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">
                <div class="row m-r-10" style="text-align: right;">
                    <div class="col s12">                        
                        <a href="/addjurusan"><button type="button" class="btn  teal mb-3">Tambah Jurusan</button></a>                                                                      
                    </div>
                </div>
                <table id="example" class=" table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <tr>
                                <th>No</th>
                                <th>Nama Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </tr>
                    </thead>                
                    <tbody>
                        @foreach($getjurusan as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>                            
                            <td>{{$data->nama_jurusan}}</td>
                            <td style="text-align: center;">
                                <a href="/editjurusan/{{ $data->id_jurusan }}">
                                    <button type="button" class="btn btn-warning amber inline">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="#modal{{ $data->id_jurusan }}" class="btn btn-danger red modal-trigger">                                    
                                    <i class="material-icons">delete</i>                                  
                                </a>
                            </td>
                        </tr>   
                        @endforeach              
                    </tbody>
                </table>
                @foreach($getjurusan as $data)
                <div id="modal{{ $data->id_jurusan }}" class="modal">
                    <div class="modal-content">
                        <h4>Hapus Data Guru</h4>
                        <p>Apakah Anda yakin ingin Menghapus jurusan {{$data->nama_jurusan}} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/deletejurusan/{{ $data->id_jurusan }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Hapus</a>
                    </div>
                </div> 
                @endforeach                
            </div>
        </div>
    </div>
</div><br>

@endsection

