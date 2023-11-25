<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = [
        'nama', 
        'nilai_komputer', 
        'nilai_jaringan', 
        'nilai_pendidikan', 
        'nilai_disiplin', 
        'nilai_kepribadian'
    ];

    public function allKaryawan()
    {
        return $this->orderBy('id', 'desc')->get();
    }
    public function saveKaryawan($payload)
    {
        return $this->create($payload);
    }
    public function edit(array $payload, int $id) {
        return $this->find($id)->update($payload);
    }
    
}
