<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Dokter;
use Session;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $p = Pasien::with('Dokter')->get();
        return view('pasien.index',compact('p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $dokter = Dokter::all();
        return view('pasien.create',compact('dokter'));
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
            'nopsn' => 'required|unique:pasiens',
            'dokter_id' => 'required'
        ]);
        $p = new Pasien;
        $p->nama = $request->nama;
        $p->nopsn = $request->nopsn;
        $p->dokter_id = $request->dokter_id;
        $p->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$p->nama</b>"
        ]);
        return redirect()->route('pasien.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $p = Pasien::findOrFail($id);
        return view('pasien.show',compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = Pasien::findOrFail($id);
        $dokter = Dokter::all();
        $selectedDokter = Pasien::findOrFail($id)->dokter_id;
        return view('pasien.edit',compact('p','dokter','selectedDokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   {
        $this->validate($request,[
            'nama' => 'required|',
            'nopsn' => 'required|',
            'dokter_id' => 'required'
        ]);
        $p = Pasien::findOrFail($id);
        $p->nama = $request->nama;
        $p->nopsn = $request->nopsn;
        $p->dokter_id = $request->dokter_id;
        $p->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$p->nama</b>"
        ]);
        return redirect()->route('pasien.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $a = Pasien::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('pasien.index');
    }
}
