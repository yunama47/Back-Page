<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class modelKeranjang extends Model
{
    use HasFactory;
    public $primaryKey = 'id';
    //untuk mendeskripsikan field yang dapat dimanipulasi
    protected $fillable = [
        'jumlah', 'alamat', 'no_telp', 'id_brg',
    ];
    static function getBarang()
    {
        $return = DB::table('model_keranjangs')
            ->join('model_barangs', 'model_keranjangs.id_brg', '=', 'model_barangs.id_brg');
        return $return;
    }
}
