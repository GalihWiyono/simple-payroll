<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gaji';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'pegawai_id',
        'gaji_pokok',
        'denda',
        'gaji_bersih',
        'tanggal'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    } 
}
