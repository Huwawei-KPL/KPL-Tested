<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    protected $table = 'users';
    use HasFactory;
    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'id_departemen',
        'id_perusahaan',
        'admin',
    ];
    public $timestamps = false;
}
