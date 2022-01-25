@extends('layouts.main', ['title'=>'Jenis'])
@section('content-header')
<div class="container">
    <h1> <i class="fas fa-layer-group"></i>Jenis</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-4">
        <form class="card card-primary" method="post" action="{{ route('jenis.store')}}">
            <div class="card-header">
                <h3 class="card-title">[+] Tambah</h3>
            </div>
            <div class="card-body">
                <x-input label="Kode" name="kode" placeholder="Kode Jenis" />
                <x-input label="Nama Jenis" name="nama_jenis" placeholder="Nama Jenis" />
                <x-textarea label="Keterangan" name="keterangan" placeholder="Keterangan" />
            </div>
            <div class="card-footer text-right">
                <x-btn-simpan />
            </div>
        </form>
    </div>
</div>
@endsection