<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gedung extends Model
{
    protected $table = 'gedung';
    use HasFactory;
    public $timestamps = false;
}
