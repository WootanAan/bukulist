<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penerbit;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbits = DB::table('penerbits')->orderBy('nama')->get();
        $data = [
            'penerbits'=>$penerbits];
        return view('penerbit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerbit.create');
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
            'penerbit' => 'required']);

        DB::table('penerbits')->insert([
            'nama' => $request->penerbit,
            'deskripsi' => $request->deskripsi]);

        return redirect('/penerbits')->with('success_message', $request->penerbit.' berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        $data = [
            'penerbit' => $penerbit];

        return view('penerbit.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        $data = [
            'penerbit' => $penerbit];

        return view('penerbit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit)
    {
        $request->validate([
            'penerbit' => 'required']);

        $penerbit->nama = $request->penerbit;
        $penerbit->deskripsi = $request->deskripsi;
        $penerbit->save();

        return redirect('/penerbits/'.$penerbit->id)->with('success_message', 'Item berhasil dihapus.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();

        return redirect('/penerbits')->with('success_message', $penerbit->nama.' berhasil dihapus.');
    }
}
