<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\pelanggan;
use Illuminate\Support\Facades\Hash;

class pelangganController extends Controller
{
    public function create()
    {
        return view('pelanggan.create_pelanggan');
    }
    public function save(Request $request)
    {

         $validateData = $request->validate([
            'nama'=> 'required|string',
            'ttl'=> 'required',
            'email'=> 'required|email',
            'password' => 'required|min:8|confirmed',
            'foto.*' => 'mimes:jpg,jpeg,png|max:5000',
        ]);
    
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('foto_pelanggan'), $filename);

        $model = new pelanggan();
        $model->insert([

            'nama' => $request->nama,
            'tgl_lahir' => $request->ttl,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'foto'=> $filename,
            'created_at' => date("Y-m-d H:i:s")
            
        ]);

        return view('pelanggan.view_pelanggan', [
            'data' => $request->all(),
            'filename' => $filename,
        ]);
    }
    public function update($id_pelanggan)
    {
         $data = pelanggan::find($id_pelanggan);

        if ($data) {

            return view('pelanggan.update_pelanggan', ['data' => $data]);
        } else {
            return redirect('pelanggan.read_pelanggan');
        }
    }
    public function edit(Request $request)
    {
        $data = pelanggan::find($request->id_pelanggan);
        // ddd($data);
        $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('foto')->getClientOriginalName());
        $request->file('foto')->move(public_path('foto_pelanggan'), $filename);
        if ($data) {
            $data->nama = $request->nama; 
            $data->tgl_lahir = $request->tgl_lahir;
            $data->foto = $filename;
            $data->updated_at = date('Y-m-d s:i:H');
            $data->save();
            return redirect('read_pelanggan')->with('pesan', 'Data dengan berhasil diupdate');
        } else {
            return redirect('read_pelanggan')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
    }
    public function delete($id_pelanggan)
    {
        $data = pelanggan::find($id_pelanggan);
        if ($data) {
            $data->delete();
             return redirect('/read_pelanggan')->with('pesan', 'Data Berhasil dihapus');
        } else {
            return redirect('/read_pelanggan')->with('pesan', 'Data tidak ditemukan');
        }
       
    }
    public function read()
{
    $datang = pelanggan::latest()->paginate(5);
        return view('pelanggan.read_pelanggan',compact('datang'))

                    ->with('i', (request()->input('page', 1) - 1) * 5);
    
}

}
