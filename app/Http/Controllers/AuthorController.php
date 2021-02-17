<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = DB::table('authors')->orderBy('nama')->get();
        $data = [
            'authors' =>$authors];
        return view('penulis.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penulis.create');
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
            'penulis' => 'required']);

        $author = new Author();
        $author->nama = $request->penulis;
        $author->deskripsi = $request->deskripsi;
        $author->save();

        return redirect('/authors')->with('success_message', $request->penulis." berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $data = [
            'author' => $author];
        return view('penulis.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $data = [
            'author' => $author];

        return view('penulis.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'penulis' => 'required']);

        $author->nama = $request->penulis;
        $author->deskripsi = $request->deskripsi;
        $author->save();

        return redirect('/authors/'.$author->id)->with('success_message', "Item berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect('/authors')->with('success_message', $author->nama.' berhasil dihapus.');
    }
}
