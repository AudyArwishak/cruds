<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = "tb_pengiriman";
    protected $primaryKey = "id_pengiriman";
    protected $fillable = ['id_pengiriman', 'id_truk', 'id_supir', 'id_outlet', 'id_gula', 'jumlah_kg'];
    public $timestamps = false;

    public function truk()
    {
        $this->belongsTo(Truk::class, 'id_truk');
    }
    public function supir()
    {
        $this->belongsTo(Supir::class, 'id_supir');
    }
    public function outlet()
    {
        $this->belongsTo(Outlet::class, 'id_outlet');
    }
    public function gula()
    {
        $this->belongsTo(Gula::class, 'id_gula');
    }
}
