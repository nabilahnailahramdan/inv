@extends('layouts.main',['title'=>'User Profile'])

@section('content-header')
<div class="container-fluid mb-2">
    <h1> <i class="fas fa-user"></i> User Profile</h1>
      </div><!-- /.container-fluid -->
 @endsection

 @section('content')
 <x-status />
 <div class="row">
     <div class="col-4">
        <form class="card card-primary" action="{{ route('petugas.profile') }}" method="post">
             <div class="card-header">
             </div>
             <div class="card-body">
                @method('PUT')
                <x-input label="Nama Petugas" name="nama_petugas" placeholder="Nama Petugas" :value="$data->nama" />
                <x-input label="Username" name="username" placeholder="Username" :value="$data->username" />
                <x-input label="Password" name="password" placeholder="Password" type="password" />
                <x-input label="Password Confirmation" name="password_confirmation" placeholder="Password Confirmation" type="password" />
             </div>
             <div class="card-footer text-right">
                <x-btn-update />
             </div>
        </form>
     </div>
 </div>
@endsection
