<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\modelBarang;
use App\Models\modelPengrajin;
use Illuminate\Http\Request;

class homeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res['barang'] = modelBarang::getPengrajin();
        //search
        if (isset($_GET['s']) && $_GET['s'] != null && $_GET['s'] != " ") {
            $s = $_GET['s'];
            $res['barang'] = $res['barang']
                ->where('nama_kerajinan', 'like', "%$s%");
        }
        $res['barang'] = $res['barang']->get();
        return response()->json($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan data edit
        $res['pengrajin'] = modelPengrajin::all();
        $res['barang'] = modelBarang::find($id);
        return response()->json($res);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // }
    public function update(Request $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
