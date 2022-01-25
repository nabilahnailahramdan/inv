<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search= $request->search;

        $data = Jenis::select('id','nama','kode','keterangan')
        ->when ($search, function($query, $search){
            return $query->where('nama','like',"%{$search}%");
        })
        ->orderBy('nama')
        ->paginate(25);
        return view('jenis.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.create');
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
            'kode'=>'required|max:100|unique:jenis',
            'nama_jenis'=>'required|between:3,100',
            'keterangan'=>'nullable|max:250',
        ]);

        Jenis::create([
            'kode'=>$request->kode,
            'nama'=>$request->nama_jenis,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('jenis.index')->with('success','store');
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
    public function edit(Jenis $jeni)
    {
        return view('jenis.edit',['data'=>$jeni]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis $jeni)
    {
        $request->validate([
            'kode'=>'required|max:100|unique:jenis,kode,'.$jeni->id,
            'nama_jenis'=>'required|between:3,100',
            'keterangan'=>'nullable|max:250',
        ]);

        $jeni->update([
            'kode'=>$request->kode,
            'nama'=>$request->nama_jenis,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('jenis.index')->with('success','update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis $jeni)
    {
        $jeni->delete();
        return back()->with('success','destroy');
    }
}
