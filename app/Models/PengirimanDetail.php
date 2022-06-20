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
        'tanggal',
        'nama_penerima',
        'tanda_tangan_penerima',
        'tanda_tangan_pengirim',
        'foto_barang_penerima',
        'foto_barang2',
        'foto_surat_jalan',
        'gps',
        'note',
        'status_delete',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
        'deleted_date',
        'deleted_by'
    ];

    protected $table = "t_pengiriman_detail";
    protected $primaryKey = "pengiriman_detail_id";
    // protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;
}
