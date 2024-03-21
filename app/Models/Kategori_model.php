<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori_model extends Model{
    use HasFactory;
    
    public function gets(){
        $query = DB::table('tb_kategori')
                ->get();

        return $query;
    }
}
