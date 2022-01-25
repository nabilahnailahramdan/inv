<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruang;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Ruang::select('id','kode','nama','keterangan')
        ->when($search, function($query, $search){
            return $query->where('nama','like',"%{$search}%");
        })
        ->paginate(25);
        return view('ruang.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruang.create');
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
            'kode'=>'required|max:100|unique:ruangs',
            'nama_ruang'=>'required|max:100',
            'keterangan'=>'nullable|min:3',
        ]);

        Ruang::create([
            'kode'=>strtoupper($request->kode),
            'nama'=>$request->nama_ruang,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('ruang.index')->with('success','store');
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
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit',['data'=>$ruang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'kode'=>'required|max:100|unique:ruangs,kode,'.$ruang->id,
            'nama_ruang'=>'required|max:100',
            'keterangan'=>'nullable|min:3',
        ]);

        $ruang->update([
            'kode'=>strtoupper($request->kode),
            'nama'=>$request->nama_ruang,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('ruang.index')->with('success','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        $ruang->delete();
        return back()->with('success','destroy');
    }
}
