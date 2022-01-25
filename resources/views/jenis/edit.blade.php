@extends('layouts.main', ['title'=>'Jenis Edit'])
@section('content-header')
<div class="container">
    <h1> <i class="fas fa-layer-group"></i>Jenis</h1>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-4">
        <form class="card card-primary" method="post" action="{{ route('jenis.update',['jeni'=>$data->id])}}">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit"></i>Edit</h3>
            </div>
            <div class="card-body">
                @method('PUT')
                <x-input label="Kode" name="kode" :value="$data->kode" placeholder="Kode Jenis" />
                <x-input label="Nama Jenis" name="nama_jenis" :value="$data->nama" placeholder="Nama Jenis" />
                <x-textarea label="Keterangan" name="keterangan" :value="$data->keterangan" placeholder="Keterangan" />
            </div>
            <div class="card-footer text-right">
                <x-btn-update />
            </div>
        </form>
    </div>
</div>
@endsection