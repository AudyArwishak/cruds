<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truk extends Model
{
    use HasFactory;
    protected $table = "tb_truk";
    protected $primaryKey = "id_truk";
    protected $fillable = ['id_truk', 'nama_truk', 'kapasitas_truk', 'plat_nomor'];
    public $timestamps = false;
}
