<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Bike;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rents', [
            "title" => "Rental",
            "rents" => Rent::where('id_pengguna', auth()->user()->id_pengguna)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        return view('rents', [
            "title" => "Rental",
            "rents" => Rent::find($rent)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //fungsi ini akan mengembalikan data-data sepeda yang disewa ke table bikes dan menghapus data yang ada di rents
        $validatedData = ([
            'id_sepeda' => $rent->id_sepeda_sewa,
            'nama_sepeda' => $rent->nama_sepeda_sewa,
            'jenis_sepeda' => $rent->jenis_sepeda_sewa,
            'gambar' => $rent->gambar_sewa,
        ]);

        if ($rent->jenis_sepeda_sewa == 'ROAD') {
            $validatedData['category_id'] = 1;
        } else if ($rent->jenis_sepeda_sewa == 'MOUNTAIN') {
            $validatedData['category_id'] = 2;
        } else if ($rent->jenis_sepeda_sewa == 'HYBRID') {
            $validatedData['category_id'] = 3;
        } else if ($rent->jenis_sepeda_sewa == 'GRAVEL') {
            $validatedData['category_id'] = 4;
        } else if ($rent->jenis_sepeda_sewa == 'ELECTRIC') {
            $validatedData['category_id'] = 5;
        }
    
        Bike::create($validatedData);
        Rent::destroy($rent->id);
        
        return redirect('/bikes')->with('success', 'Sepeda berhasil dikembalikan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRentRequest  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }
}
