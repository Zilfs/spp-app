<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $fillable = [
        'nama', 'tgl_pembayaran', 'jumlah'
    ];

    protected $hidden = [

    ];

    public static function getAllspp()
    {
        $result = DB::table('payments')->select('id', 'nama', 'tgl_pembayaran', 'jumlah')->get()->toArray();
        return $result;
    }
}
