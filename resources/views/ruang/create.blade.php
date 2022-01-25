@extends('layouts.main',['title'=>'Ruang Tambah'])

@section('content-header')
<div class="container-fluid">
    <h1> <i class="fas fa-archive"></i>Ruang</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-4">
        <form class="card card-primary" method="post" action="{{ route('ruang.store')}}">
            <div class="card-header">
                <h3 class="card-title">[+] Tambah</h3>
            </div>
            <div class="card-body">
                <x-input label="Kode" name="kode" placeholder="Kode Ruang" />
                <x-input label="Nama Ruang" name="nama_ruang" placeholder="Nama Ruang" />
                <x-textarea label="Keterangan" name="keterangan" placeholder="Keterangan" />
            </div>
            <div class="card-footer text-right">
                <x-btn-simpan />
            </div>
        </form>
    </div>
</div>
@endsection