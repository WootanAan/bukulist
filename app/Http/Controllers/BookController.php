<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Lemary;
use App\Models\Penerbit;
// use App\Models\Tag;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')->orderBy('id', 'desc')->get();

        $data = [
            'books' => $books];
        return view('buku.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = DB::table('authors')->orderBy('nama')->get();
        $penerbits = DB::table('penerbits')->orderBy('nama')->get();
        $tahuns = DB::table('tahuns')->orderBy('tahun', 'desc')->get();
        $categories = DB::table('categories')->orderBy('nama', 'asc')->get();
        $lemaries = DB::table('lemaries')->orderBy('nama', 'asc')->get();
        // $tags = DB::table('tags')->orderBy('nama', 'asc')->get();

        $data = [
            'authors' => $authors,
            'penerbits' => $penerbits,
            'tahuns' => $tahuns,
            'categories' => $categories,
            'lemaries' => $lemaries,
            // 'tags' => $tags,
        ];
        return view('buku.create', $data);
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
            'buku' => 'required',
            'tebal' => 'required|numeric|integer',
            'jumlah_buku' => 'required|numeric|integer',
            'gambar' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,svg']);

        $fileName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('gambar_sampul'), $fileName);

        $status = 0;
        if ($request->jumlah_buku > 0) {
            $status = 1;
        }

        $book = new Book();
        $book->nama = $request->buku;
        $book->author_id = $request->author_id;
        $book->penerbit_id = $request->penerbit_id;
        $book->tahun_id = $request->tahun_id;
        $book->tebal = $request->tebal;
        $book->sinopsis = $request->sinopsis;
        $book->deskripsi = $request->deskripsi;
        $book->category_id = $request->category_id;
        $book->lemary_id = $request->lemary_id;
        $book->jumlah_buku = $request->jumlah_buku;
        $book->status = $status;
        $book->gambar = $fileName;
        $book->save();

        return redirect('/books')->with('success_message', $request->buku.' berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $data = [
            'book' => $book];

        return view('buku.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = DB::table('authors')->orderBy('nama')->get();
        $penerbits = DB::table('penerbits')->orderBy('nama')->get();
        $tahuns = DB::table('tahuns')->orderBy('tahun', 'desc')->get();
        $categories = DB::table('categories')->orderBy('nama', 'asc')->get();
        $lemaries = DB::table('lemaries')->orderBy('nama', 'asc')->get();

        $data = [
            'book' => $book,
            'authors' => $authors,
            'penerbits' => $penerbits,
            'tahuns' => $tahuns,
            'categories' => $categories,
            'lemaries' => $lemaries,
        ];
        return view('buku.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'buku' => 'required',
            'tebal' => 'required|numeric|integer',
            'jumlah_buku' => 'required|numeric|integer',
            'gambar' => 'required|file|mimes:jpg,jpeg,bmp,png,gif,svg']);

        $fileName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('gambar_sampul'), $fileName);

        $status = 0;
        if ($request->jumlah_buku > 0) {
            $status = 1;
        }

        $book->nama = $request->buku;
        $book->author_id = $request->author_id;
        $book->penerbit_id = $request->penerbit_id;
        $book->tahun_id = $request->tahun_id;
        $book->tebal = $request->tebal;
        $book->sinopsis = $request->sinopsis;
        $book->deskripsi = $request->deskripsi;
        $book->category_id = $request->category_id;
        $book->lemary_id = $request->lemary_id;
        $book->jumlah_buku = $request->jumlah_buku;
        $book->status = $status;
        $book->gambar = $fileName;
        $book->save();

        return redirect('/books')->with('success_message', $request->buku.' berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/books')->with('success_message', $book->nama.' berhasil dihapus.');
    }
}
