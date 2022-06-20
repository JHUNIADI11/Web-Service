<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return response()->json($data, 200);
    }
//cara pertama menampilkan data

//    public function show(Customer $id)
//    {
//        return response()->json($id, 200);
//    }

   //cara kedua menampilkan data
   public function show($id)
   {
       $data=Customer::where('id',$id)->first();
       if($data==null){
           return response()->json([
               'pesan'=>'Data tidak ditemukan',
               'data'=>$data
           ],404);
       }
       return response()->json([
        'pesan'=>'Data ditemukan',
        'data'=>$data
    ],200);
   }
   public function store(Request $request)
   {
       $validate= validator::make($request->all(),[
           'name'=>'require',
           'phone'=>'require',
           'email'=>'require',
           'address'=>'require|min:5',
       ]);
       if($validate->fails()){
           return $validate->errors();
       }

       //proses simpan
       $data = Customer::create($request->all());
       return response()->json([
           'pesan'=>'Data Berhasil Disimpan',
           'data'=>$data
       ],201);
   }

   public function update(Request $request,$id)
   {
    $data=Customer::where('id',$id)->first();
//cek data dengan id yg dikirim
    if($data==null){
        return response()->json([
            'pesan'=>'Data tidak ditemukan',
            'data'=>$data
        ],404);
    }
    //proses validasi
    $validate= validator::make($request->all(),[
        'name'=>'require',
        'phone'=>'require',
        'email'=>'require',
        'address'=>'require|min:5',
    ]);
    if($validate->fails()){
        return $validate->errors();
    }

    //proses simpan update data
    $data->update($request->all());

    return response()->json([
        'pesan'=>'Data Berhasil Update',
        'data'=>$data
    ],201);
   }

   public function delete($id)
   {
    $data=Customer::where('id',$id)->first();

    //cek data dengan id yg dikirim
    if($data==null){
        return response()->json([
            'pesan'=>'Data tidak ditemukan',
            'data'=>$data
        ],404);
    }
    $data->delete();

    return response()->json([
        'pesan'=>'Data Berhasil dihapus',
        'data'=>$data
    ],200);

   }
}
