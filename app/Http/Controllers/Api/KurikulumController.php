<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\KurikulumHelpers\KurikulumHelper;
use App\Http\Resources\Customer\KurikulumCollection;

class KurikulumController extends Controller
{
    private $kurikulum;
    
    public function __construct()
    {
        $this->kurikulum = new KurikulumHelper();
    }
    /**
     * Menampilkan Kurikulum.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = ['nama' => $request->nama ?? ''];
        $listKurikulum = $this->kurikulum->getAll($filter, $request->itemperpage ?? 0, $request->sort ?? '');

        return response()->success(new KurikulumCollection($listKurikulum));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
