<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerankinganModel extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    public function getNormalisasi()
    {
        $nilaiKomputer = 0.30;
        $nilaJaringan = 0.25;
        $nilaiPendidikan = 0.20;
        $nilaiDisiplin = 0.15;
        $nilaiKepribadian = 0.10;

        $karyawan = DB::table('karyawan')
            ->select(
                'karyawan.nama as nama', 
                DB::raw('karyawan.nilai_komputer * ' . $nilaiKomputer . ' as nilai_komputer'),
                DB::raw('karyawan.nilai_jaringan * ' . $nilaJaringan . ' as nilai_jaringan'),
                DB::raw('karyawan.nilai_pendidikan * ' . $nilaiPendidikan . ' as nilai_pendidikan'),
                DB::raw('karyawan.nilai_disiplin * ' . $nilaiDisiplin . ' as nilai_disiplin'),
                DB::raw('karyawan.nilai_kepribadian * ' . $nilaiKepribadian . ' as nilai_kepribadian')
            )
            ->orderBy('id','DESC')
            ->get();

        return $karyawan;
    }
    public function getVektor()
    {
        $normalisasi = $this->getNormalisasi();
    
        $vektor = [];
        $totalKriteria  = 0;
    
        foreach ($normalisasi as $item) {
            // Melakukan sesuatu dengan nilai normalisasi, contoh:
            $nilaiKriteria = $item->nilai_komputer + $item->nilai_jaringan + $item->nilai_pendidikan + $item->nilai_disiplin + $item->nilai_kepribadian;
            $vektor['data'][] = [
                'nama' => $item->nama,
                'total_nilai' => $nilaiKriteria,
                // ... tambahkan field lain jika diperlukan
            ];
            $totalKriteria += $nilaiKriteria;
        }
        $vektor['total_semua'] = $totalKriteria;
    
        return $vektor;
    }
    public function getNilaiV()
    {
        $vektor = $this->getVektor();
        $dataNilaiV = [];

        foreach ($vektor['data'] as $nilaiVektor) {
          $nilaiv  = $nilaiVektor['total_nilai'] / $vektor['total_semua'];
          $dataNilaiV[] = 
            [
                'nama' => $nilaiVektor['nama'],
                'total_nilai' => number_format($nilaiv, 2)
            ];
        }
        // dd($dataNilaiV);
        return $dataNilaiV;
    }
    public function getRanking()
    {
        $nilaiV = $this->getNilaiV();

        // Urutkan array berdasarkan total_nilai dari yang terbesar ke yang terkecil
        usort($nilaiV, function ($a, $b) {
            return $b['total_nilai'] <=> $a['total_nilai'];
        });

        return($nilaiV);
    }
    
}
