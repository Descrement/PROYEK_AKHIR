<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\buku;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class bukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index(): View

    {

        $bukus = buku::latest()->paginate(5);

        

        return view('buku.index',compact('bukus'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'judul'=> 'required|string',
            'penulis'=> 'required',
            'tahun_terbit'=> 'date',
            'foto.*' => 'mimes:jpg,jpeg,png|max:5000',
        ]);
    
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('foto_buku'), $filename);

        $model = new buku();
        $model->insert([

            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis'=>$request->penulis,
            'foto'=> $filename,
            'created_at' => date("Y-m-d H:i:s")
            
        ]);

        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_buku): View
    {
        $post = buku::findOrFail($id_buku);

        //render view with post
        return view('buku.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_buku):view
    {
        $post = buku::findOrFail($id_buku);

        //render view with post
        return view('buku.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $data = buku::find($id);
        // ddd($data);
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('foto_buku'), $filename);
        if ($data) {
            $data->update([
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis'=>$request->penulis,
            'foto'=> $filename,
            'updated_at' => date("Y-m-d H:i:s"),
           ]);
            
             return redirect()->route('buku.index')->with('pesan', 'Data data berhasil diupdate');
        } else {
            return redirect()->route('buku.index')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_buku)
    {
        $post = buku::findOrFail($id_buku);

        //delete image
        Storage::delete('foto_buku/'. $post->foto);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('buku.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
