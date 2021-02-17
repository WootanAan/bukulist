<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lemary;
use Illuminate\Support\Facades\DB;

class LemaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'lemaries' => DB::table('lemaries')->orderBy('nama', 'asc')->get()];
        return view('lemari.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lemari.create');
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
            'lemari' => 'required']);

        $lemary = new Lemary();
        $lemary->nama = $request->lemari;
        $lemary->save();

        return redirect('/lemaries')->with('success_message', "Lemari ".$request->lemari." berhasil ditambahkan.");
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
    public function edit(Lemary $lemary)
    {
        
        $data = [
            'lemary' => $lemary];

        return view('lemari.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lemary $lemary)
    {
        $request->validate([
            'lemari' => 'required']);

        $lemary->nama = $request->lemari;
        $lemary->save();

        return redirect('/lemaries')->with('success_message', "Item berhasil diedit.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lemary $lemary)
    {
        $lemary->delete();

        return redirect('/lemaries')->with('success_message', $lemary->nama." berhasil dihapus.");
    }
}
