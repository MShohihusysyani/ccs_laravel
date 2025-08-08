<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'klien_id',
        'nama_user',
        'username',
        'password',
        'role',
        'tgl_registrasi',
        'divisi',
        'active',
        'last_login'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getData()
    {
        return DB::table('users')
            ->select('id_user', 'klien_id', 'nama_user', 'username', 'role', 'tgl_registrasi', 'divisi', 'active', 'last_login')
            ->orderBy('role', 'desc')
            ->get();
    }

    // Data Petugas
    public static function getDataPetugas()
    {
        return DB::table('users')
            ->select('id_user', 'nama_user', 'role', 'active')
            ->where('role', ['helpdesk', 'implementator'])
            ->where('active', 'Aktif')
            ->get();
    }

    // Data Implementator
    public static function getDataImplementator()
    {
        return DB::table('users')
            ->select('id_user', 'nama_user', 'role', 'active')
            ->where('role', 'implementator')
            ->where('active', 'Aktif')
            ->get();
    }
}
