<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\RecordSignature;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

class KurikulumModel extends Model
{
    use SoftDeletes, RecordSignature, HasRelationships, HasFactory;

    /**
     * deklarasi tabel m_kurikulum
     *
     * @var string
    */
    protected $table = 'm_kurikulum';

     /**
     * Deklarasi primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_kurikulum';

    /**
     * Akan mengisi kolom "created_at" dan "updated_at" secara otomatis,
     *
     * @var bool
     */
    public $timestamps = true;
    
    protected $fillable = [
        'kode_kurikulum',
        'nama_kurikulum',
        'tahun',
        'periode',
        'profil__lulusan'
    ];
    public function getAll(array $filter, int $itemPerPage = 0, string $sort = ''): object
    {
        $kurikulum = $this->query();

        if (!empty($filter['kode_kurikulum'])) {
            $kurikulum->where('kode_kurikulum', 'LIKE', '%'.$filter['kode_kurikulum'].'%');
        }

        if (!empty($filter['nama_kurikulum'])) {
            $kurikulum->where('nama_kurikulum', 'LIKE', '%'.$filter['nama_kurikulum'].'%');
        }

        $sort = $sort ?: 'id DESC';
        $kurikulum->orderByRaw($sort);
        $itemPerPage = $itemPerPage > 0 ? $itemPerPage : false;
        
        return $kurikulum->paginate($itemPerPage)->appends('sort', $sort);
    }
}
