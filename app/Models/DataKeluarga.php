<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'nama_pasangan',
        'pekerjaan_pasangan',
        'tempatlahir_pasangan',
        'tanggallahir_pasangan',
        'goldar_pasangan',
        'nama_anak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}