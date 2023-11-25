<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\PerankinganModel;
use Yajra\DataTables\Facades\DataTables;

class PerankinganController extends Controller
{
    private $ranking;
    
    public function __construct()
    {
        $this->ranking = new PerankinganModel();
    }

    public function home()
    {
        $ranking = $this->ranking->getRanking();

        return view('home', compact('ranking'));
    }

    public function getAllNormalisasi()
    {
        $normalisasi = $this->ranking->getNormalisasi();
        return DataTables::of($normalisasi)->make(true);
    }

    public function getVektorData()  
    {
        $vektor = $this->ranking->getVektor();
    
        return DataTables::of($vektor['data'])->make(true);
    }

    public function getNilaiVData()
    {
        $nilaiV = $this->ranking->getNilaiV();
        return DataTables::of($nilaiV)->make(true);
    }
    public function getRankingData()
    {
        $Ranking = $this->ranking->getRanking();
        return DataTables::of($Ranking)->make(true);
    }
}
