<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data= Petugas::select('id','nama','username','level', 'no_telepon')
        ->when($search, function ($query, $search) {
            return $query->where('nama','like', "%{$search}%");
        })
        ->orderBy('nama')
        ->paginate(25);

        return view('petugas.index',[ 'data'=>$data] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas'=>'required|max:50|regex:/^[a-zA-ZÑñ\s]+$/',
            'username'=>'required|between:3,100|alpha_dash|unique:petugas',
            'no_telepon'=>'nullable|digits_between:11,13',
            'password'=>'required|min:4|confirmed',
        ]);

        $class = new Petugas();
        $class->nama = $request->nama_petugas;
        $class->username = $request->username;
        $class->level = 'operator';
        $class->password = bcrypt($request->password);
        $class->no_telepon = $request->no_telepon;
        $class->save();

        return redirect()->route('petugas.index')->with('success','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petuga)
    {
        return view('petugas.edit',['data'=>$petuga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petuga)
    {
        $request->validate([
            'nama_petugas'=>'required|between:3,100',
            'username'=>"required|between:3,100|alpha_dash|unique:petugas,username,{$petuga->id}",
            'no_telepon'=>"nullable|digits_between:11,13",
            'password'=>'nullable|min:4|confirmed',
        ]);

        if( $request->password){
            $query = [
                'nama'=>$request->nama_petugas,
                'username'=>$request->username,
                'no_telepon'=>$request->no_telepon,
                'password'=> bcrypt($request->password),
            ];
        } else {
            $query = [
                'nama'=>$request->nama_petugas,
                'no_telepon'=>$request->no_telepon,
                'username'=>$request->username,
            ];
        }

        $petuga ->forceFill( $query )->save();

        return redirect()->route('petugas.index')->with('success','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petuga)
    {
        $petuga->delete();
        return redirect()->route('petugas.index')->with('success','destroy');
    }
}
