<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $table = "tb_outlet";
    protected $primaryKey = "id_outlet";
    protected $fillable = ['id_outlet', 'nama_outlet', 'alamat_outlet', 'notelp'];
    public $timestamps = false;
}
