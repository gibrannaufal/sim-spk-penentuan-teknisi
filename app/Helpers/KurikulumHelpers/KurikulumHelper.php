<?php

namespace App\Helpers\KurikulumHelpers;

use App\Models\KurikulumModel;

/**
 * Helper untuk manajemen customer
 * Mengambil data, menambah, mengubah, & menghapus ke tabel m_customer
 *
 * @author Wahyu Agung <wahyuagung26@gmail.com>
 */
class KurikulumHelper 
{
    private $kurikulumModel;

    public function __construct()
    {
        $this->kurikulumModel = new KurikulumModel();
    }

    /**
     * Mengambil data kurikulum dari tabel m_kurikulum
     *
     * @author Wahyu Agung <wahyuagung26@gmail.com>
     *
     * @param  array $filter
     * $filter['nama_kurikulum'] = string
     * $filter['periode'] = string
     * @param integer $itemPerPage jumlah data yang tampil dalam 1 halaman, kosongi jika ingin menampilkan semua data
     * @param string $sort nama kolom untuk melakukan sorting mysql beserta tipenya DESC / ASC
     *
     * @return object
     */
    public function getAll(array $filter, int $itemPerPage = 0, string $sort = ''): object
    {
        return $this->kurikulumModel->getAll($filter, $itemPerPage, $sort);
    }

  

   
}
