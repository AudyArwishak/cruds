<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "tb_gudang";
    protected $primaryKey = "id_gudang";
    protected $fillable = ['id_gudang', 'nama_gudang', 'alamat_gudang', 'id_gula'];
    public $timestamps = false;

    public function gula()
    {
        $this->belongsTo(Gula::class, 'id_gula');
    }
}
