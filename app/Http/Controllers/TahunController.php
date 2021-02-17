<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahuns = DB::table('tahuns')->orderBy('tahun', 'desc')->get();
        $data = [
            'tahuns' => $tahuns];
        return view('tahun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun.create');
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
            'tahun' => 'required|numeric|integer']);

        $tahun = new Tahun();
        $tahun->tahun = $request->tahun;
        $tahun->save();

        return redirect('/tahuns')->with('success_message', $request->tahun." berhasil ditambahkan.");
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
    public function edit(Tahun $tahun)
    {
        $data = [
            'tahun' => $tahun
        ];
        return view('tahun.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'tahun' => 'required|numeric|integer']);

        $tahun->tahun = $request->tahun;
        $tahun->save();

        return redirect('/tahuns')->with('success_message', "Item berhasil diedit.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect('/tahuns')->with('success_message', $tahun->tahun." berhasil dihapus");
    }
}
