<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
 // tampil
 public function index()
 {
     $datas = Order::all();
     return response()->json([
         'pesan' => 'Data Berhasil Ditemukan',
         'data' => $datas
     ], 200);
 }
 // tampil berdasarkan id
 public function show($id)
 {
     $data = Order::find($id);
     if (empty($data)) {
         return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
     }
     return response()->json(['pesan' => 'Data Berhasil Ditemukan', 'data' => $data], 200);
 }
 // create
 public function store(Request $request)
 {
     $validasi = Validator::make($request->all(), [
         'id' => 'required|numeric|unique:orders',
         'customer_id' => 'required|numeric',
         'product_id' => 'required|numeric',
         'status' => 'required',
     ]);
     if ($validasi->fails()) {
         return response()->json(['pesan' => 'data gagal ditambahkan', 'data' => $validasi->errors()->all()], 404);
     }
     $data = Order::create($request->all());
     return response()->json(['pesan' => 'data berhasil ditambahkan', 'data' => $data], 200);
 }
 // update
 public function update(Request $request, $id)
 {
     $orders = Order::find($id);
     if (empty($orders)) {
         return response()->json(['pesan' => 'data tidak ditemukan', 'data' => ''], 404);
     } else {
         $validasi = Validator::make($request->all(), [
             'id' => 'required|numeric|unique:orders',
             'customer_id' => 'required|numeric',
             'product_id' => 'required|numeric',
             'status' => 'required',
         ]);
         if ($validasi->fails()) {
             return response()->json(['pesan' => 'Data Gagal diUpdate', 'data' => $validasi->errors()->all()], 404);
         }
         $orders->update($request->all());
         return response()->json(['pesan' => 'Data Berhasil disimpan', 'data' => $orders], 200);
     }
 }
 // Hapus
 public function destroy($id)
 {
     $orderes = Order::find($id);
     if (empty($orderes)) {
         return response()->json(['pesan' => 'Data Tidak ditemukan', 'data' => ''], 404);
     }
     $orderes->delete();
     return response()->json(['pesan' => 'Data Berhasil dihapus', 'data' => $orderes]);
 }
 // tes relasi
 public function indexRelasi()
 {
     $order = Order::with('customer','product')->get();
     return response()->json(['pesan' => 'Data Berhasil ditemukan', 'data' => $order], 200);
 }
}
