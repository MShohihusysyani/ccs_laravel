<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    protected $table = 'pelaporan';
    protected $primaryKey = 'id_pelaporan';

    protected $fillable = [
        'klien_id',
        'no_tiket',
        'judul',
        'perihal',
        'kategori',
        'priority',
        'maxday',
        'file',
        'tags',
        'impact',
        'status',
        'handle_by',
        'handle_by2',
        'handle_by3',
        'rating',
        'has_rated',
        'catatan_finish',
        'file_finish',
        'mode_fokus',
    ];

    // Relasi ke model Klien
    public function klien()
    {
        return $this->belongsTo(Klien::class, 'klien_id');
    }
}
