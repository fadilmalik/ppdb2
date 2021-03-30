<?php

namespace App\Http\Controllers;

use App\Regist;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regists = Regist::latest()->paginate(5);
  
        return view('regists.index',compact('regists'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('regists.create');
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
            'nis' => 'required',
            'nama' => 'required',
            'jns_kelamin' => 'required',
            'temp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);
  
        Regist::create($request->all());
   
        return redirect()->route('regists.index')
                        ->with('success','regist created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function show(Regist $regist)
    {
        return view('regists.show',compact('regist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function edit(Regist $regist)
    {
        return view('regists.edit',compact('regist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Regist $regist)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'jns_kelamin' => 'required',
            'temp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required'
        ]);
  
        $regist->update($request->all());
  
        return redirect()->route('regists.index')
                        ->with('success','regist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\regist  $regist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regist $regist)
    {
        $regist->delete();
  
        return redirect()->route('regists.index')
                        ->with('success','regist deleted successfully');
    }

    public function landing(){
        return view('landing');
    }
}
