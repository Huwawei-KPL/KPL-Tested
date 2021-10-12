<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    protected $table = 'perusahaan';
    use HasFactory;
    protected $fillable = [
        'nama_perusahaan',
        'lokasi',
        'deskripsi',
        'created_at',
    ];
    public $timestamps = true;
}
