@section('headtitle', 'Dashboard')
@section('page', 'Home')
@section('subtitle', 'Dashboard')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col l3 m6 s12">
        <div class="card">
            <div class="card-content center-align">
                <div>
                    <span class="blue-text display-6"><i class="ti-clipboard"></i></span>
                </div>
                <div>
                    <h4>{{$jam}}</h4>
                    <h6 class="blue-text font-medium m-b-0">Jumlah jam</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col l3 m6 s12">
        <div class="card">
            <div class="card-content center-align">
                <div>
                    <span class="cyan-text display-6"><i class="ti-agenda"></i></span>
                </div>
                <div>
                    <h4>{{$jurnal}}</h4>
                    <h6 class="cyan-text font-medium m-b-0">Jurnal</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
