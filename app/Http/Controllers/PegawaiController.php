<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Pegawai::select('id','nama','nip','username')
        ->when( $search, function ($query, $search) {
            return $query->where('nama','like', "%{$search}%");
        })
        ->orderBy('nama')
        ->paginate(25);
        return view('pegawai.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
            'nama_pegawai' => 'required|between:3,100|regex:/^[a-zA-ZÑñ\s]+$/',
            'nip' => 'nullable|between:3,100|unique:pegawais,nip',
            'alamat' => 'nullable|min:5',
            'username' => 'required|between:3,100|alpha_dash|unique:pegawais',
            'password' => 'required|min:4|confirmed',
        ]);

        $class = new Pegawai();
        $class->nama = $request->nama_pegawai;
        $class->nip = $request->nip;
        $class->alamat = $request->alamat;
        $class->username = $request->username;
        $class->password = bcrypt($request->password);
        $class->save();

        return redirect()->route('pegawai.index')->with('success','store');
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
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit',['data'=>$pegawai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_pegawai' => 'required|between:3,100',
            'nip' => 'nullable|between:3,100|unique:pegawais,nip,'.$pegawai->id,
            'alamat' => 'nullable|min:5',
            'username' => 'required|between:3,100|alpha_dash|unique:pegawais,username,'.$pegawai->id,
            'password' => 'nullable|min:4|confirmed',
        ]);

        if( $request->password){
            $query = [
                'nama'=>$request->nama_pegawai,
                'username'=>$request->username,
                'password'=> bcrypt($request->password),
                'nip'=>$request->nip,
                'alamat'=>$request->alamat,
            ];
        } else {
            $query = [
                'nama'=>$request->nama_pegawai,
                'username'=>$request->username,
                'nip'=>$request->nip,
                'alamat'=>$request->alamat,
            ];
        }

        $pegawai ->forceFill( $query )->save();

        return redirect()->route('pegawai.index')->with('success','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('success', 'destroy');
    }
}
