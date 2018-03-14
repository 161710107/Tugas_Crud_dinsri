<?php

namespace App\Http\Controllers;
use App\Pasien;
use App\Kepala;
use Session;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $w = Kepala::with('Pasien')->get();
        return view('kepala.index',compact('w'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p = Pasien::all();
        return view('kepala.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|',
            'pasien_id' => 'required'
        ]);
        $w = new Kepala;
        $w->nama = $request->nama;
        $w->pasien_id = $request->pasien_id;
        $w->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$w->nama</b>"
        ]);
        return redirect()->route('kepala.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Kepala  $kepala
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $w = Kepala::findOrFail($id);
        return view('kepala.show',compact('w'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kepala  $kepala
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $w = Kepala::findOrFail($id);
        $p = Pasien::all();
        $selectedP = Kepala::findOrFail($id)->pasien_id;
        return view('kepala.edit',compact('p','w','selectedP'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kepala  $kepala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   {
        $this->validate($request,[
            'nama' => 'required|',
            'pasien_id' => 'required'
        ]);
        $w = Kepala::findOrFail($id);
        $w->nama = $request->nama;
        $w->pasien_id = $request->pasien_id;
        $w->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$w->nama</b>"
        ]);
        return redirect()->route('kepala.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kepala  $kepala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $a = Kepala::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kepala.index');
    }
}
