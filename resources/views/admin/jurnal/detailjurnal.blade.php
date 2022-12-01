@section('headtitle', 'Dashboard')
@section('page', 'Home')
@section('subtitle', 'Dashboard')

@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <div class="card-content">
                <div class="center-align m-t-30"> <img src="{{ asset('images-guru') }}/{{$getjurnal->foto_guru}}" class="circle" width="150" />
                    <h4 class="card-title m-t-10">{{$getjurnal->nama_guru}}</h4>
                    <h6 class="card-subtitle">{{$getjurnal->nama_mapel}}</h6>
                </div>
            </div>
            <hr>
            <div class="card-content">
                <small>Kode guru </small>
                <h6 class="m-t-5">{{$getjurnal->kode_guru}}</h6>
                <small>Kelas</small>
                <h6 class="m-t-5">{{$getjurnal->kelas}} {{$getjurnal->nama_jurusan}} {{$getjurnal->no_kelas}}</h6>
                <small>Jam Pelajaran</small>
                <h6 class="m-t-5">{{$getjurnal->jam_mulai}} - {{$getjurnal->jam_selesai}}</h6><br><br><br>
            </div>
        </div>
    </div>
    <div class="col s12 m8">
        <div class="card">
            <div class="row">
                <div id="timeline" class="col s12">
                    <div class="card-content">
                        <div class="profiletimeline">
                            <div class="sl-item">
                                <div class="sl-left"> <img src="{{ asset('images-guru') }}/{{$getjurnal->foto_guru}}" alt="user" class="circle" /> </div>
                                <div class="sl-right">
                                    <div> <a href="javascript:void(0)" class="">Dokumentasi</a> <span class="sl-date"></span>
                                        <div class="row m-t-30">
                                            <div class="col s3">
                                                <img src="{{ asset('images-jurnal') }}/{{$getjurnal->foto}}" alt="user" class="responsive-img radius" />
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"> <img src="{{ asset('images-guru') }}/{{$getjurnal->foto_guru}}" alt="user" class="circle" /> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="">Deskripsi Jurnal</a> <span class="sl-date"></span>
                                        <p class="m-t-10">{{$getjurnal->deskripsi}}</p><br>
                                        <p>{{$getjurnal->tanggal}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection