<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "tb_pegawai";
    protected $primaryKey = "id_pegawai";
    protected $fillable = ['id_pegawai', 'nama_pegawai', 'jabatan', 'alamat', 'notelp'];
    public $timestamps = false;
}
