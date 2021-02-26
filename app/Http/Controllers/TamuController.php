<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TamuController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => DB::table('categories')->orderBy('nama')->get()];
    	return view('tamu.index', $data);
    }

    public function cari(Request $request)
    {
    	$request->validate([
    		'cari' => 'required']);

    	$cari = "%".$request->cari."%";

    	$books = DB::table('books')
    		->where('nama', 'like', $cari)
    		->orWhere('sinopsis', 'like', $cari)
    		->orWhere('deskripsi', 'like', $cari)
    		->paginate(20);
    	$cek = $books->count();
    	if ($cek < 1) {
    		return redirect('/')->with('error_message', 'Tidak ditemukan data yang mirip.');
    	}

    	$data = [
            'books' => $books,
            'categories' => DB::table('categories')->orderBy('nama')->get()];
    	return view('tamu.hasilCari', $data);
    }

    public function detail($id) {
        $book = DB::table('books')->where('id', '=', $id)->first();
        $author = DB::table('authors')->where('id', '=', $book->author_id)->first();
        $tahun = DB::table('tahuns')->where('id', '=', $book->tahun_id)->first();
        $category = DB::table('categories')->where('id', '=', $book->category_id)->first();
        $lemary = DB::table('lemaries')->where('id', '=', $book->lemary_id)->first();
        $penerbit = DB::table('penerbits')->where('id', '=', $book->penerbit_id)->first();

        DB::table('books')->where('id', $id)->update(['populer' => $book->populer + 1]);

    	$data = [
    		'book' => $book,
            'author' => $author,
            'tahun' => $tahun,
            'category' => $category,
            'lemary' => $lemary,
            'penerbit' => $penerbit,
            'categories' => DB::table('categories')->orderBy('nama')->get()];
    	return view('tamu.detail', $data);
    }

    public function terbaru()
    {
        $books = DB::table('books')
            ->orderBy('id', 'desc')
            ->paginate(20);
        $data = [
            'books' => $books,
            'categories' => DB::table('categories')->orderBy('nama')->get()];
        return view('tamu.terbaru', $data);
    }

    public function kategori($id)
    {
        $category = DB::table('categories')->where('id', '=', $id)->first();
        $books = DB::table('books')->where('category_id', '=', $id)->get();

        $data = [
            'category' => $category,
            'books' => $books,
            'categories' => DB::table('categories')->orderBy('nama')->get()];

        return view('tamu.kategori', $data);
    }

    public function tahun()
    {
        $tahuns = DB::table('tahuns')->orderBy('tahun', 'desc')->get();

        $data = [
            'tahuns' => $tahuns,
            'categories' => DB::table('categories')->orderBy('nama')->get(),];

        return view('tamu.tahun', $data);
    }

    public function tahunDetail($id)
    {
        $tahun = DB::table('tahuns')->where('id', '=', $id)->first();
        $books = DB::table('books')->where('tahun_id', '=', $id)->get();
        $data = [
            'books' => $books,
            'tahun' => $tahun,
            'categories' => DB::table('categories')->orderBy('nama')->get()
        ];

        return view('tamu.tahunDetail', $data);
    }

    public function penulis()
    {
        $authors = DB::table('authors')->orderBy('nama', 'desc')->paginate(100);

        $data = [
            'authors' => $authors,
            'categories' => DB::table('categories')->orderBy('nama')->get(),];

        return view('tamu.author', $data);
    }

    public function penulisDetail($id)
    {
        $author = DB::table('authors')->where('id', '=', $id)->first();
        $books = DB::table('books')->where('author_id', '=', $id)->get();
        $data = [
            'books' => $books,
            'author' => $author,
            'categories' => DB::table('categories')->orderBy('nama')->get()
        ];

        return view('tamu.authorDetail', $data);
    }

    public function populer()
    {
        $books = DB::table('books')
            ->orderBy('populer', 'desc')
            ->paginate(20);
        $data = [
            'books' => $books,
            'categories' => DB::table('categories')->orderBy('nama')->get()];
        return view('tamu.populer', $data);
    }
}
