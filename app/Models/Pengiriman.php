<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengiriman_id',
        'bbk_id',
        'kendaraan_id',
        'nik',
        'nama_surat_jalan',
        'tanggal_surat_jalan',
        'project_id',
        'status_delete',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
        'deleted_date',
        'deleted_by',
    ];

    protected $table = "t_pengiriman";
    protected $primaryKey = "pengiriman_id";
    // protected $keyType = 'string';

    public $incrementing = true;
    public $timestamps = false;
}
