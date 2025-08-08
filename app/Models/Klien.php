<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';
    public $timestamps = false;

    protected $fillable = [
        'kode_klien',
        'nama_klien',
        'status',
    ];

    public static function getData()
    {
        return DB::table('klien')
            ->select('id_klien', 'kode_klien', 'nama_klien', 'status')
            ->orderBy('kode_klien', 'asc')
            ->get();
    }

    // Generate Kode Otomatis
    public static function generateKode()
    {
        $lastClient = self::orderBy('kode_klien', 'desc')->first();
        $newNumber = $lastClient ? (int) $lastClient->kode_klien + 1 : 1;
        return str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
