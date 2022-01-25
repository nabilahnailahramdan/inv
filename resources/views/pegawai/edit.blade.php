@extends('layouts.main',['title'=>'Pegawai Edit'])
@section('content-header')
<div class="container-fluid">
    <h1> <i class="fas fa-users"></i>Pegawai </h1>
</div>
@endsection

@section('content')
<form method="post" action="{{ route('pegawai.update', ['pegawai'=>$data->id]) }}"class="card card-primary">
    <div class="card-header">
       <h3 class="card-title"><i class="fas fa-edit"></i>Edit</h3> 
    </div>
    <div class="card-body">
        @method('PUT')
        <div class="row">
            <div class="col">
                <x-input 
                label="Nama Pegawai" 
                name="nama_pegawai" 
                placeholder="Nama Lengkap Pegawai"
                :value="$data->nama" />
                <x-input 
                label="NIP" 
                name="nip" 
                placeholder="NIP" 
                :value="$data->nip" />
                <x-textarea 
                label="Alamat" 
                name="alamat" 
                placeholder="Alamat" 
                :value="$data->alamat" />
            </div>
            <div class="col">
            <x-input 
            label="Username" 
            name="username" 
            placeholder="Username"
            :value="$data->username" />
            <x-input 
            label="Password" 
            name="password" 
            placeholder="Password" 
            type="password"/>
            <x-input 
            label="Password Confirmation" 
            name="password_confirmation" 
            placeholder="Password Confirmation"
            type="password"/>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <x-btn-update />
    </div>
</form>
@endsection

