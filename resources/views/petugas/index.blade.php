@extends('layouts.main',['title'=>'Petugas'])

@section('content-header')
<div class="container-fluid mb-2">
    <h1> <i class="fas fa-user-friends"></i> Petugas</h1>
      </div><!-- /.container-fluid -->
 @endsection

 @section('content')

 <x-status />

 <div class="card">
     <div class="card header">
         <div class="row">
             <div class="col">
                <x-btn-tambah label="Petugas" :link="route('petugas.create')" />
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
                    <th>No.</th><th>Nama Petugas</th><th>Username</th><th>Nomor Hp</th><th>Level</th><th>Action</th>
                </tr>
             </thead>
             <body>
                 <?php $no = 1;?>
                 @foreach ( $data as $col )
                 <tr>
                     <td>{{ $no++ }}</td>
                     <td>{{ $col->nama }}</td>
                     <td>{{ $col->username }}</td>
                     <td>{{$col->no_telepon}}</td>
                     <td>{{ ucwords( $col->level) }}</td>
                     <td>
                        <x-btn-edit :link="route('petugas.edit',['petuga'=>$col->id])" />
                        @if ( $col->level != 'admin') 
                        <x-btn-hapus :link="route('petugas.destroy',['petuga'=>$col->id])" />
                        @endif
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