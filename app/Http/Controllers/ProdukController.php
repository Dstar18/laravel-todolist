<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller{
    
    public function gets(){
        $query = DB::table('tb_produk')
                ->join('tb_kategori', 'tb_kategori.idKategori', '=', 'tb_produk.kategoriID')
                ->get();

        echo json_encode($query);
    }

    public function get($id){
        $query = DB::table('tb_produk')
                ->where('idProduk',$id)
                ->join('tb_kategori', 'tb_kategori.idKategori', '=', 'tb_produk.kategoriID')
                ->get();

        echo json_encode($query);
    }

    public function insert(){
        $post = array(
            'kategoriID'    => 1,
            'nama'          => 'Beras 5kg',
            'jumlah'        => 50,
            'satuan'        => 'karung',
            'harga'         => '60 rb',
            'created_at'    => date("Y-m-d H:i:s")
        );
        $query = DB::table('tb_produk')->insertGetId($post);

        echo json_encode($query);
    }

    public function update($id){
        $post = array(
            'nama'          => 'Seblak pedas',
            'update_at'    => date("Y-m-d H:i:s")
        );
        $query = DB::table('tb_produk')->where('idProduk',$id)->update($post);

        echo json_encode($query);
    }

    public function delete($id){
        $query = DB::table('tb_produk')->where('idProduk',$id)->delete();
        echo json_encode($query);
    }
}
