<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\buku;
use App\Models\pelanggan;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $bukus = peminjaman::latest()->paginate(5);
        return view('peminjaman.indexpm',compact('bukus'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman.createpm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
         $this->validate($request, [
            'buku_id' => 'required|int',
            'pelanggan_id' => 'required|int',
        ]);
        $id_buku = $request->buku_id;
        $id_pelanggan = $request->pelanggan_id;
        $judulBuku = buku::find($id_buku);
        $namaPeminjam = pelanggan::find($id_pelanggan);
        
        $judul = $judulBuku->judul;
        $nama = $namaPeminjam->nama; 
        $model = new peminjaman();
        $model->insert([

            'buku_id'     => $request->buku_id,
            'pelanggan_id'     => $request->pelanggan_id,
            'judul_buku' => $judul,
            'nama_pelanggan' => $nama,
            'note' => $request->note,
            'created_at'   => date("Y-m-d H:i:s"),
            
        ]);
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_peminjaman)
    {
        $post = peminjaman::findOrFail($id_peminjaman);

        //render view with post
        return view('peminjaman.editpm', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_peminjaman)
{
    $data = peminjaman::find($id_peminjaman);
    if ($data) {
            $data->note = $request->note;
            $data->save();
            return redirect()->route('peminjaman.index')->with('pesan', 'Data berhasil diupdate');
        } else {
            return redirect()->route('peminjaman.index')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_peminjaman)
    {
        $post = peminjaman::findOrFail($id_peminjaman);
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function kembali($id_peminjaman){
        $data = peminjaman::find($id_peminjaman);
        
        if($data){
            $data->updated_at = date('Y-m-d s:i:H');
            $data->save();
        }
         return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    } 
    }

