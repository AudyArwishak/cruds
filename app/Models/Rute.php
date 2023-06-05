<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;
    protected $table = "tb_rute";
    protected $primaryKey = "id_rute";
    protected $fillable = ['id_rute', 'nama_rute', 'jarak_rute'];
    public $timestamps = false;
}
