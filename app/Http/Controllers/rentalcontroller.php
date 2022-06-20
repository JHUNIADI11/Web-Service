<?php

namespace App\Http\Controllers;
use App\Models\rent;
use Illuminate\Http\Request;

class rentalcontroller extends Controller
{
    public function index()
    {
        $data = rent::all();
        return view('rental/index', compact('data'));
    }
    public function create()
    {
        return view('rental/add');
    }
    public function ambilData(Request $request)
    {
        $this->validate($request, [
            'id_barang' => 'required|numeric|unique:rental2|min:1',
            'nama_barang' => 'required|min:5|max:10',
            'nama_penyewa' => 'required|min:2|max:50',
            'harga_sewa' => 'required|min:4|max:255',
            'jumlah_sewa' => 'required|min:1|max:255',
            'keterangan' => 'required|min:4|max:255'     
        ]);
        $data = rent::create($request->all());
        // redirect
        return redirect('data-rental');
        // dd($request->all());
    }
    public function destroy(rent $id)
    {
        $id->delete();
        return redirect(url('data-rental'));
    }
    public function edit($id)
    {
        $data = rent::find($id);
        // dd($data);
        return view('rental/edit', compact('data'));
    }
    public function update($id, Request $request)
    {
        $data = rent::find($id);
        //    validasi update rental
        $rental2Valid = [
            'nama_barang' => 'required|min:3',
            'nama_penyewa' => 'required|min:5',
            'harga_sewa' => 'required|min:5',
            'jumlah_sewa' => 'required|min:1',
            'keterangan' => 'required|min:5'
        ];
        // validasi id untuk id agar tidak sama dengan id yg lain(unique)

        if ($request->id_barang != $data->id_barang) {
            $rental2Valid['id_barang'] = 'required|unique:rental2';
        }
        $validatedData = $request->validate($rental2Valid);
        // end validasi blog
        $data->update($request->all());
        // redirect
        return redirect(url('data-rental'));
        // dd($request->all());
    }
}
