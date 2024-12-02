<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserDataPribadi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'goldar',
        'alamat',
        'angkatan',
        'nama_sekolah',
        'pekerjaan',
        'nama_kantor',
        'alamat_kantor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
