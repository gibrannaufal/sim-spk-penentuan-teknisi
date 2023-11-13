<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class KurikulumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_kurikulum' => $this->id_kurikulum,
            'kode_kurikulum' => $this->kode_kurikulum,
            'nama_kurikulum' => $this->nama_kurikulum,
            'tahun' => $this->tahun,
            'periode' => $this->periode,
            'profil_lulusan' => $this->profil_lulusan,
        ];
    }
}
