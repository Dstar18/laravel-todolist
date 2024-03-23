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
        $result['produk'] = Produk_model::gets();
        $result['message'] = $response;
        
        return view('produk.produk_view',$result);
    }

    public function getID($id){
        $produk = Produk_model::getID($id);
        if($produk->isNotEmpty()){
            $result['produk'] = $produk;

            return $result;
        }else{
            return ([
                'resultCode'    => 404,
                'message'       => 'Data tidak ditemukan !!'
            ]);
        }

    }

    public function insert_view(){
        $result['kategori'] = Kategori_model::gets();

        return view('produk.produk_insert',$result);
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

    public function update_view($id){
        $produk = Produk_model::getID($id);
        if($produk->isNotEmpty()){
            $result['produk'] = $produk;
            $result['kategori'] = Kategori_model::gets();

            return view('produk.produk_update', $result);
        }else{
            return ([
                'resultCode'    => 404,
                'message'       => 'Data tidak ditemukan !!'
            ]);
        }
    }
    
    public function update(Request $request){
        $data = array(
            'idProduk'      => $request->idProduk,
            'kategoriID'    => $request->kategoriID,
            'nama'          => $request->nama,
            'jumlah'        => $request->jumlah,
            'satuan'        => $request->satuan,
            'harga'         => $request->harga,
            'update_at'     => date("Y-m-d H:i:s")
        );
        $result = Produk_model::updateByID($data);
        
        return redirect('/');
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
