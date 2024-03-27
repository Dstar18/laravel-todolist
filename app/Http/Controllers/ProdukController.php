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

    public function insert(Request $request){
        if ($request->isMethod('post')) {
            $data = array(
                'kategoriID'    => $request->kategoriID,
                'nama'          => $request->nama,
                'jumlah'        => $request->jumlah,
                'satuan'        => $request->satuan,
                'harga'         => $request->harga,
                'created_at'    => date("Y-m-d H:i:s")
            );
            $response['getInsertID'] = Produk_model::insert($data);
            $response['result'] = "Created successfully";
            
            return $this->gets($response);
        }else{
            $result['kategori'] = Kategori_model::gets();
            return view('produk.produk_insert',$result);
        }
    }

    public function update(Request $request, $id){
        if ($request->isMethod('post')) {
            $data = array(
                'idProduk'      => $request->idProduk,
                'kategoriID'    => $request->kategoriID,
                'nama'          => $request->nama,
                'jumlah'        => $request->jumlah,
                'satuan'        => $request->satuan,
                'harga'         => $request->harga,
                'update_at'     => date("Y-m-d H:i:s")
            );
            Produk_model::updateByID($data);
            $result['message']['result'] = "Update successfully";
            $result['produk'] = Produk_model::getID($id);
            $result['kategori'] = Kategori_model::gets();

            return view('produk.produk_update', $result);
        }else{
            $produk = Produk_model::getID($id);
            if($produk->isNotEmpty()){
                $result['produk'] = $produk;
                $result['kategori'] = Kategori_model::gets();

                return view('produk.produk_update', $result);
            }else{
                $response['error'] = "Data tidak ditemukan !!";

                return $this->gets($response);
            }    
        }
    }

    public function delete($id){
        $cekID = Produk_model::getID($id);
        if($cekID->isNotEmpty()){
            Produk_model::deleteByID($id);
            $response['result'] = "Delete successfully";
        }else{
            $response['error'] = "Data tidak ditemukan !!";
        }
        return $this->gets($response);
    }
}
