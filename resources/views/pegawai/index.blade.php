@extends('layouts.main',['title'=>'Pegawai'])
@section('content-header')
<div class="container-fluid">
    <h1> <i class="fas fa-users"></i>Pegawai </h1>
</div>
@endsection

@section('content')
 <x-status />
 <div class="card">
     <div class="card header">
         <div class="row">
             <div class="col">
                <x-btn-tambah label="Pegawai" :link="route('pegawai.create')" />
             </div>
             <div class="col">
                <x-search />
             </div>
         </div>
     </div>
     <div class="card-body">
         <table class="table table-sm table-striped table-hover">
             <thead>
                <tr>
                    <th>No.</th><th>Nama Pegawai</th><th>NIP</th><th>Username</th><th>Action</th>
                </tr>
             </thead>
             <tbody>
                 <?php $no = 1; ?>
                 @foreach ( $data as $col )
                 <tr>
                     <td>{{ $no++}}</td>
                     <td>{{ $col ->nama}}</td>
                     <td>{{ $col ->nip}}</td>
                     <td>{{ $col -> username}}</td>
                     <td>
                        <x-btn-edit :link="route('pegawai.edit', ['pegawai'=>$col->id])" />
                        <x-btn-hapus :link="route('pegawai.destroy',['pegawai'=>$col->id])" />
                     </td>
                 </tr>   
                 @endforeach                        
             </tbody>          
         </table>  
         <p>
         {{ $data->appends(['search'=>request()->search])->links('layouts.pages') }}
         </p>   

     </div>
</div>
@endsection

<x-modal-delete />