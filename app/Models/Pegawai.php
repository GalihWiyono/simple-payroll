<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_pegawai',
        'divisi',
        'phone',
        'email',
        'salary'
    ];

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    } 

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    } 
}
