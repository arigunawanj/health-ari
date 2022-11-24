<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan ke Halaman Artikel
        $article = Article::all();
        $category = Category::all(); // Memanggil Value Kategori ke dalam Select Option
        return view('artikel.tampil', compact('article', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto')->store('artikel/foto'); // Menyimpan Foto

        Article::create([
            'judul' => $request->judul,
            'isi' => $request->judul,
            'tanggal' => $request->tanggal,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'foto' => $file,
        ]); // Menyimpan Data

        return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // Jika Fotonya ada
        if($request->hasFile('foto')){
            $file = $request->file('foto')->store('artikel/foto'); // Menyimpan Foto
            Storage::delete($article->foto);
            $article->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
                'foto' => $file,
            ]); // Menyimpan Data
        } else {
            // Jika tidak ada perganti foto
            $article->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
                'category_id' => $request->category_id,
                'user_id' => Auth::user()->id,
            ]); // Menyimpan Data
        }
        return redirect('article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if(Storage::delete($article->foto)){
            Storage::delete($article->foto);
        }
        $article->delete();
        return redirect('article');
    }
}
