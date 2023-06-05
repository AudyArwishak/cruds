<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gula extends Model
{
    use HasFactory;
    protected $table = "tb_gula";
    protected $primaryKey = "id_gula";
    protected $fillable = ['id_gula', 'nama_gula', 'stok_gula'];
    public $timestamps = false;

    public function gudang()
    {
        $this->hasOne(Gudang::class, 'id_gula');
    }
}
