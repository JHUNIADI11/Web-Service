<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductConntroller extends Controller
{
    // tampil
    public function index()
    {
        $datas = product::all();
        return response()->json([
            'pesan' => 'Data Berhasil Ditemukan',
            'data' => $datas
        ], 200);
    }
    // tampil berdasarkan id
    public function show($id)
    {
        $data = product::find($id);
        if (empty($data)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        return response()->json(['pesan' => 'Data Berhasil Ditemukan', 'data' => $data], 200);
    }
    // create
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id' => 'required|numeric|unique:product',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'categori_id' => 'required|numeric'
        ]);
        if ($validasi->fails()) {
            return response()->json(['pesan' => 'data gagal ditambahkan', 'data' => $validasi->errors()->all()], 404);
        }
        $data = product::create($request->all());
        return response()->json(['pesan' => 'data berhasil ditambahkan', 'data' => $data], 200);
    }
    // update
    public function update(Request $request, $id)
    {
        $products = product::find($id);
        if (empty($products)) {
            return response()->json(['pesan' => 'data tidak ditemukan', 'data' => ''], 404);
        } else {
            $validasi = Validator::make($request->all(), [
                'id' => 'required|numeric|unique:product',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric',
                'categori_id' => 'required|numeric'
            ]);
            if ($validasi->fails()) {
                return response()->json(['pesan' => 'Data Gagal diUpdate', 'data' => $validasi->errors()->all()], 404);
            }
            $products->update($request->all());
            return response()->json(['pesan' => 'Data Berhasil disimpan', 'data' => $products], 200);
        }
    }
    // Hapus
    public function destroy($id)
    {
        $products = product::find($id);
        if (empty($products)) {
            return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
        }
        $products->delete();
        return response()->json(['pesan' => 'Data Berhasil dihapus', 'data' => $products]);
    }
    // tes relasi
    public function indexRelasi()
    {
        $products = product::with('category')->get();
        return response()->json(['pesan' => 'Data Berhasil ditemukan', 'data' => $products], 200);
    }
}
