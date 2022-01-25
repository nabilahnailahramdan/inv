<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PetugasProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        return view('petugas.profile',['data'=>$data]);
    }

    public function update (Request $request)
    {
        $data = Auth::user();
        $request->validate([
            'nama_petugas'=>'required|between:3,100',
            'username'=>"required|between:3,100|alpha_dash|unique:petugas,username,{$data->id}",
            'password'=>'nullable|min:4|confirmed',
        ]);

        if( $request->password){
            $query = [
                'nama'=>$request->nama_petugas,
                'username'=>$request->username,
                'password'=> bcrypt($request->password),
            ];
        } else {
            $query = [
                'nama'=>$request->nama_petugas,
                'username'=>$request->username,
            ];
        }

        $data ->forceFill( $query )->save();
        return back()->with('success','update');
    }
}