@extends('layouts.main',['title'=>'Ruang Edit'])

@section('content-header')
<div class="container-fluid">
    <h1> <i class="fas fa-archive"></i>Ruang</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-4">
        <form class="card card-primary" method="post" action="{{ route('ruang.update',['ruang'=>$data->id])}}">
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i>Edit</h3>
            </div>
            <div class="card-body">
                <x-input label="Kode" name="kode" placeholder="Kode Ruang" :value="$data->kode" />
                <x-input label="Nama Ruang" name="nama_ruang" placeholder="Nama Ruang" :value="$data->nama" />
                <x-textarea label="Keterangan" name="keterangan" placeholder="Keterangan" :value="$data->keterangan" />
            </div>
            <div class="card-footer text-right">
                <x-btn-update />
            </div>
        </form>
    </div>
</div>
@endsection