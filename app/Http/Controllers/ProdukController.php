<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\UtilHelper;
use App\Models\Produk_model;
use App\Models\Kategori_model;

class ProdukController extends Controller{

    public function testhelper(){
        $data = UtilHelper::to_obj();
        return $data;
    }
    
    public function gets($response=false){
        $produk = Produk_model::gets();
        $message = $response;
        
        return view('produk.produk_view',['produk' => $produk],['message' => $message]);
    }

    public function getID($id){
        $produk = Produk_model::getID($id);
        if($produk->isNotEmpty()){
            return $produk;
        }else{
            return ([
                'resultCode'    => 404,
                'message'       => 'Data tidak ditemukan !!'
            ]);
        }

    }

    public function insert_view(){
        $kategori = Kategori_model::gets();

        return view('produk.produk_insert',['kategori' => $kategori]);
    }

    public function insert(Request $request){
        $data = array(
            'kategoriID'    => $request->kategoriID,
            'nama'          => $request->nama,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'harga'         => $request->harga,
            'created_at'    => date("Y-m-d H:i:s")
        );
        $getInsertID = Produk_model::insert($data);
        
        return redirect('/');
    }

    public function update($id){
        $cekID = Produk_model::getID($id);
        if($cekID->isNotEmpty()){
            $post = array(
                'idProduk'      => $id,
                'nama'          => 'Smart TV 2',
                'update_at'     => date("Y-m-d H:i:s")
            );
            $result = Produk_model::updateByID($post);
            return ([
                'resultCode'    => 200,
                'message'       => 'Data berhasil diupdate',
                'result'        => $result,
                'cekid'         => $cekID
            ]);
        }else{
            return ([
                'resultCode'    => 404,
                'message'       => 'Data tidak ditemukan !!'
            ]);
        }
    }

    public function delete($id){
        $cekID = Produk_model::getID($id);
        if($cekID->isNotEmpty()){
            $result = Produk_model::deleteByID($id);
            return redirect('/');
        }else{
            return ([
                'resultCOde'    => 404,
                'message'       => 'Data tidak ditemukan !!'
            ]);
        }
    }
}
