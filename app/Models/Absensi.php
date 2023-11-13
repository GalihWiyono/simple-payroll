<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    public $timestamps = false;

    protected $fillable = [
        'pegawai_id',
        'tanggal',
        'waktu_absensi',
        'status',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'pegawai_id', 'id');
    } 
}
