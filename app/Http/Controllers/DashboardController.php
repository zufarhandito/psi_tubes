<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Kabupaten;
use App\Homestay;
use App\User;
use App\Homestay_verif;

class DashboardController extends Controller
{
    public function createHomestay(){
        $kabupatens = Kabupaten::all();
        return view('homestay.create', compact('kabupatens'));
    }

    

    public function storeHomestay(Request $request){
       
        $homestay = new Homestay();
        $homestay->nama_homestay = $request->nama_homestay;
        $homestay->deskripsi = $request->deskripsi;
        $homestay->fasilitas = $request->fasilitas;
        $homestay->alamat_lengkap = $request->alamat_lengkap;
        $homestay->id_kabupaten = $request->id_kabupaten;
        $homestay->id_user = $request->id_user;
        $homestay->is_verified = 'belum';
        $homestay->harga = $request->harga;

        $foto = $request->file('foto');
        $nama_foto = $foto->getClientOriginalName();
        $tujuan_upload = 'foto_homestay';
        $foto->move($tujuan_upload,$nama_foto);
        $homestay->foto = $nama_foto;
        $homestay->save();

        return redirect('/index');
    }
    public function index(){
        return view('homestay.index');
    }
    public function edit(Homestay $homestay){
        $kabupatens = Kabupaten::all();
        return view('homestay.show', compact('homestay', 'kabupatens'));
    }
    public function update(Request $request, Homestay $homestay){
        $foto = $request->file('foto');
        if(file_exists($foto)){
            $nama_foto = $foto->getClientOriginalName();
            $tujuan_upload = 'foto_homestay';
            $foto->move($tujuan_upload,$nama_foto);
        }else{
            $nama_foto = $request->foto;
        }
        $homestay->update([
            "nama_homestay" => $request->nama_homestay,
            "deskripsi" => $request->deskripsi,
            "fasilitas" => $request->fasilitas,
            "alamat_lengkap" => $request->alamat_lengkap,
            "id_kabupaten" => $request->id_kabupaten,
            "foto" => $nama_foto,
        ]);
        return redirect("/homestay/edit/$homestay->id")->with('status', 'Selamat! Kamu berhasil melakukan perubahan!');
    }
    public function destroy(Homestay $homestay){
        $homestay->delete();
        return redirect("/homestay")->with('status', 'Selamat! Kamu berhasil menghapus homestay!');
    }



    public function showuser(){
     $hasil = User::all();
     return view('showuser',['liat'=>$hasil]);
}
    
    public function lihatverif()
    {
        // mengambil data dari table homestay_verif
        $homestays = array();
        $homestays2 = Homestay::all();
        foreach($homestays2 as $h){
            if($h->is_verified == 'belum'){
                $homestays[] = $h;
            }
        }
 
        // mengirim data pegawai ke view index
        return view('verifikasiyes', compact('homestays'));
 
    }

    
    public function lihatlistverif()
    {
        // mengambil data dari table homestay_verif
        $homestays = Homestay::all();
        $homestay_verif = array();
        foreach($homestays as $h){
            if($h->is_verified == 'belum'){
                $homestay_verif[] = $h;
            }
        }
 
        // mengirim data pegawai ke view index
        return view('verifikasibelum',['homestay_verif' => $homestay_verif]);
 
    }

     // method untuk hapus data homestay
    public function hapus($id)
{
    // menghapus data pegawai berdasarkan id yang dipilih
    DB::table('homestay')->where('id',$id)->delete();
        
    // alihkan halaman ke halaman pegawai
    return redirect('/verifikasiyes');
}


  
    
 
}
