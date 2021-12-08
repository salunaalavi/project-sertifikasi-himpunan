<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Rent;
use App\Models\Category;
use App\Http\Requests\StoreBikeRequest;
use App\Http\Requests\UpdateBikeRequest;
use Illuminate\Support\Facades\Storage;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('tipe', request('category'));
            $title = ' ' . $category->tipe;
        }

        return view('bikes', [
            'title' => 'Bikes',
            'tipe' => 'ALL' . $title,
            'categories' => Category::all(),
            'bikes' => Bike::filter(request(['search', 'category']))->orderBy('id_sepeda', 'asc')->paginate(6)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/bikes', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBikeRequest $request)
    {
        $validatedData = $request->validate([
            'id_sepeda' => 'required|max:255',
            'nama_sepeda' => 'required|max:255',
            'jenis_sepeda' => 'required',
            'gambar' => 'required|image'
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('bike-images');

        if ($request->jenis_sepeda == 'ROAD') {
            $validatedData['category_id'] = 1;
        } else if ($request->jenis_sepeda == 'MOUNTAIN') {
            $validatedData['category_id'] = 2;
        } else if ($request->jenis_sepeda == 'HYBRID') {
            $validatedData['category_id'] = 3;
        } else if ($request->jenis_sepeda == 'GRAVEL') {
            $validatedData['category_id'] = 4;
        } else if ($request->jenis_sepeda == 'ELECTRIC') {
            $validatedData['category_id'] = 5;
        }

        Bike::create($validatedData);

        return redirect('/bikes')->with('success', 'Sepeda berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function show(Bike $bike)
    {
        return view('bikes', [
            "title" => "Bikes",
            'tipe' => 'ALL',
            "bikes" => Bike::find($bike)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function edit(Bike $bike)
    {
        //fungsi ini akan memindahkan data sepeda yang ingin disewa ke table rents dan menghapus data sepeda di table bikes
        $validatedData = ([
            'id_sepeda_sewa' => $bike->id_sepeda,
            'nama_sepeda_sewa' => $bike->nama_sepeda,
            'jenis_sepeda_sewa' => $bike->jenis_sepeda,
            'gambar_sewa' => $bike->gambar,
            'id_pengguna' => auth()->user()->id_pengguna

        ]);
    
        Rent::create($validatedData);
        Bike::destroy($bike->id);
        
        return redirect('/rents')->with('success', 'Sepeda berhasil disewa!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBikeRequest  $request
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBikeRequest $request, Bike $bike)
    {
        $validatedData = $request->validate([
            'nama_sepeda' => 'required|max:255',
            'jenis_sepeda' => 'required',
            'gambar' => 'required|image'
        ]);

        Storage::delete($request->old_gambar);
        $validatedData['gambar'] = $request->file('gambar')->store('bike-images');
        $validatedData['id_sepeda'] = $bike->id_sepeda;

        if ($request->jenis_sepeda == 'ROAD') {
            $validatedData['category_id'] = 1;
        } else if ($request->jenis_sepeda == 'MOUNTAIN') {
            $validatedData['category_id'] = 2;
        } else if ($request->jenis_sepeda == 'HYBRID') {
            $validatedData['category_id'] = 3;
        } else if ($request->jenis_sepeda == 'GRAVEL') {
            $validatedData['category_id'] = 4;
        } else if ($request->jenis_sepeda == 'ELECTRIC') {
            $validatedData['category_id'] = 5;
        }

        Bike::where('id', $bike->id)->update($validatedData);

        return redirect('/bikes')->with('berhasil', 'Sepeda berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bike $bike)
    {
        Storage::delete($bike->gambar);
        Bike::destroy($bike->id);

        return redirect('/bikes')->with('oke', 'Sepeda berhasil dihapus!');
    }
}
