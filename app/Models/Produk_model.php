<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk_model extends Model{
    use HasFactory;

    public function gets(){
        $query = DB::table('tb_produk')
                ->join('tb_kategori', 'tb_kategori.idKategori', '=', 'tb_produk.kategoriID')
                ->get();

        return $query;
    }

    public function getID($id){
        $query = DB::table('tb_produk')
                ->where('idProduk',$id)
                ->join('tb_kategori', 'tb_kategori.idKategori', '=', 'tb_produk.kategoriID')
                ->get();

        return $query;
    }

    public function insert($post){
        $query = DB::table('tb_produk')->insertGetId($post);

        return $query;
    }

    public function updateByID($post){
        $query = DB::table('tb_produk')
                ->where('idProduk',$post['idProduk'])
                ->update($post);

        return $query;
    }

    public function deleteByID($id){
        $query = DB::table('tb_produk')
                ->where('idProduk',$id)
                ->delete();

        return $query;
    }
}
