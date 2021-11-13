<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class pengajuanSurat extends Model
{
    protected $guarded = [];

    public function jenisPengajuan()
    {
        return $this->belongsTo(jenis_pengajuan::class, 'index_id', 'id');
    }
}
