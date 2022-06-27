<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengiriman_detail_id',
        'pengiriman_id',
        'status_pengiriman',
        'nama_penerima',
        'tanda_tangan_penerima',
        'tanda_tangan_pengirim',
        'foto_barang_penerima',
        'foto_barang2',
        'foto_surat_jalan',
        'gps',
        'gps_time',
        'note',
        'status_delete',
        'created_date',
        'created_by'
    ];

    protected $table = "t_pengiriman_detail";
    protected $primaryKey = "pengiriman_detail_id";
    // protected $keyType = 'string';

    public $incrementing = true;
    public $timestamps = false;
}
