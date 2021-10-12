<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    protected $table = 'ruangan';
    use HasFactory;
    public $timestamps = false;
}
