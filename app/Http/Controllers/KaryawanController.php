<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaryawanModel;

class KaryawanController extends Controller
{
    private $karyawan;
    
    public function __construct()
    {
        $this->karyawan = new KaryawanModel();
    }

    public function index()
    {
        $karyawan = $this->karyawan->allKaryawan();

        return view('karyawan', compact('karyawan'));
    }

    public function store(Request $request)
    {
         // Validasi input
        $request->validate([
            'nama' => 'required|string', 
            'nilai_komputer' => 'required|numeric', 
            'nilai_jaringan' => 'required|numeric', 
            'nilai_pendidikan' => 'required|numeric', 
            'nilai_disiplin' => 'required|numeric', 
            'nilai_kepribadian' => 'required|numeric', 
        ]);

        // Simpan data ke dalam model
        $data = $request->only(['nama', 'nilai_komputer', 'nilai_jaringan', 'nilai_pendidikan', 'nilai_disiplin', 'nilai_kepribadian']);
        $result = $this->karyawan->saveKaryawan($data);

        if ($result) {
            // Jika penyimpanan berhasil, redirect ke halaman karyawan
            return redirect()->route('karyawan')->with('success', 'Karyawan berhasil ditambahkan!');
        } else {
            // Jika terjadi kesalahan, redirect dengan pesan kesalahan
            return redirect()->route('karyawan')->with('error', 'Gagal menambahkan karyawan. Silakan coba lagi.');
        }
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string', 
            'nilai_komputer' => 'required|numeric', 
            'nilai_jaringan' => 'required|numeric', 
            'nilai_pendidikan' => 'required|numeric', 
            'nilai_disiplin' => 'required|numeric', 
            'nilai_kepribadian' => 'required|numeric', 
        ]);

        // Temukan data berdasarkan ID
        $karyawan = $this->karyawan->find($id);

        if (!$karyawan) {
            // Jika data tidak ditemukan, kembalikan pesan kesalahan
            return redirect()->route('karyawan')->with('error', 'Karyawan tidak ditemukan.');
        }

        // Simpan data ke dalam model
        $data = $request->only(['nama', 'nilai_komputer', 'nilai_jaringan', 'nilai_pendidikan', 'nilai_disiplin', 'nilai_kepribadian']);
        $result = $karyawan->edit($data,$id);

        if ($result) {
            // Jika pembaruan berhasil, redirect ke halaman karyawan
            return redirect()->route('karyawan')->with('success', 'Karyawan berhasil diperbarui!');
        } else {
            // Jika terjadi kesalahan, redirect dengan pesan kesalahan
            return redirect()->route('karyawan')->with('error', 'Gagal memperbarui karyawan. Silakan coba lagi.');
        }
    }
    public function destroy($id)
    {
        // Temukan data berdasarkan ID
        $karyawan = $this->karyawan->find($id);

        if (!$karyawan) {
            // Jika data tidak ditemukan, kembalikan pesan kesalahan
            return redirect()->route('karyawan')->with('error', 'Karyawan tidak ditemukan.');
        }

        // Hapus data
        $karyawan->delete();

        // Jika penghapusan berhasil, redirect ke halaman karyawan
        return redirect()->route('karyawan')->with('success', 'Karyawan berhasil dihapus!');
    }
  

}
