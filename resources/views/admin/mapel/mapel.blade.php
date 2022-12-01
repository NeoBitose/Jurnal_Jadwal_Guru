@section('headtitle', 'Mata Pelajaran')
@section('page', 'Pengajar')
@section('subtitle', 'Mata Pelajaran')

@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content tbl">
                <div class="row m-r-10" style="text-align: right;">
                    <div class="col s12">                        
                        <a href="/addmapel"><button type="button" class="btn  teal mb-3">Tambah Mapel</button></a>                                                                      
                    </div>
                </div>
                <table id="example" class=" table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <tr>
                                <th>No</th>
                                <th>Nama mapel</th>
                                <th>Aksi</th>
                            </tr>
                        </tr>
                    </thead>                
                    <tbody>
                        @foreach($getmapel as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>                            
                            <td>{{$data->nama_mapel}}</td>
                            <td style="text-align: center;">
                                <a href="/editmapel/{{ $data->id_mapel }}">
                                    <button type="button" class="btn btn-warning amber inline">
                                        <i class="material-icons">edit</i>
                                    </button>
                                </a>
                                <a href="#modal{{ $data->id_mapel }}" class="btn btn-danger red modal-trigger">                                    
                                    <i class="material-icons">delete</i>                                  
                                </a>
                            </td>
                        </tr>   
                        @endforeach              
                    </tbody>
                </table>
                @foreach($getmapel as $data)
                <div id="modal{{ $data->id_mapel }}" class="modal">
                    <div class="modal-content">
                        <h4>Hapus Data Guru</h4>
                        <p>Apakah Anda yakin ingin Menghapus mapel {{$data->nama_mapel}} ?</p>
                    </div>
                    <div class="modal-footer" style="padding: 0px 15px 40px 0px;">
                        <a href="/deletemapel/{{ $data->id_mapel }}" class="modal-action modal-close waves-effect waves-green btn red m-r-10 m-b-10">Hapus</a>
                    </div>
                </div> 
                @endforeach                
            </div>
        </div>
    </div>
</div><br>

@endsection

