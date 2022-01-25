@extends('layouts.main',['title'=>'Ruang'])

@section('content-header')
<div class="container-fluid">
    <h1> <i class="fas fa-archive"></i>Ruang</h1>
</div>
@endsection

@section('content')

 <x-status />

 <div class="card">
     <div class="card header">
         <div class="row">
             <div class="col">
                <x-btn-tambah label="Ruang" :link="route('ruang.create')" />
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
                    <th>No.</th><th>Kode</th><th>Nama Ruang</th><th>Keterangan</th><th>Action</th>
                </tr>
             </thead>
             <body>
                 <?php $no = 1;?>
                 @foreach ( $data as $col )
                 <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ $col->kode }}</td>
                     <td>{{ $col->nama }}</td>
                     <td>{{ $col->keterangan}}</td>
                     <td>
                        <x-btn-edit :link="route('ruang.edit',['ruang'=>$col->id])" />
                        <x-btn-hapus :link="route('ruang.destroy',['ruang'=>$col->id])" />
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