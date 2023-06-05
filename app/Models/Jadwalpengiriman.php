<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwalpengiriman extends Model
{
    use HasFactory;
    protected $table = "tb_jadwalpengiriman";
    protected $primaryKey = "id_jadwal";
    protected $fillable = ['id_jadwal', 'tanggal_pengiriman', 'id_pengiriman', 'id_gudang', 'id_outlet'];
    public $timestamps = false;

    public function pengiriman()
    {
        $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function gudang()
    {
        $this->belongsTo(Gudang::class, 'id_gudang');
    }

    public function outlet()
    {
        $this->belongsTo(Outlet::class, 'id_outlet');
    }
}
