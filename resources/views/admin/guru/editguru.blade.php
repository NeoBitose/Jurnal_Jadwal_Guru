@section('headtitle', 'Edit Guru')
@section('page', 'Data Guru')
@section('subtitle', 'Edit Guru')

@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <form action="/updateguru/{{$getguru->id_guru}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-content">
                    <h5 style="font-weight: bold; color:#7158fd;" class="card-title">Data Guru</h5><br>

                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>NIP</label>
                                <input class="form-control" name="nip" type="number" required value="{{$getguru->nip}}">
                                <div class=" materialize-red-text">
                                    @error('nip')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="form-group">
                                <label>Nama Guru</label>
                                <input class="form-control" name="nama" type="text" required value="{{$getguru->nama_guru}}">
                                <div class=" materialize-red-text">
                                    @error('nama')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="username" type="text" required value="{{$getguru->username}}">
                                <div class="m-t-10 materialize-red-text">
                                    @error('username')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div><br><br>
                    <h6 style="font-weight: bold; color:#7158fd;">Ubah password (opsional)</h6><br>
                    <div class="row">
                        <div class="col s6">
                            <div class="form-group">
                                <label>Password lama</label>
                                <input id="passinput" class="form-control" name="password" type="Password">
                                <label>
                                    <input type="checkbox" onclick="showPass()" />
                                    <span>lihat kata sandi</span>
                                </label>
                                <div class="m-t-10 materialize-red-text">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input class="form-control" id="newpassinput" name="passwordnew" type="Password">
                                <label>
                                    <input type="checkbox" onclick="showPassNew()" />
                                    <span>lihat kata sandi</span>
                                </label>
                                <div class=" materialize-red-text">
                                    @error('password_new')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col s5">
                            <button class="btn teal" type="submit" name="submit">Edit Guru</button>
                        </div>
                    </div>
                </div><br><br><br>
            </form>
        </div>
    </div>
</div>
<script>
    function showPass() {
        var pass = document.getElementById("passinput");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }

    function showPassNew() {
        var newpass = document.getElementById("newpassinput");
        if (newpass.type === "password") {
            newpass.type = "text";
        } else {
            newpass.type = "password";
        }
    }
</script>
@endsection