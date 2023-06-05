<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supir extends Model
{
    use HasFactory;
    protected $table = "tb_supir";
    protected $primaryKey = "id_supir";
    protected $fillable = ['id_supir', 'nama_supir', 'alamat_supir', 'notelp', 'id_truk'];
    public $timestamps = false;

    public function truk()
    {
        $this->belongsTo(Truk::class, 'id_truk');
    }
}
