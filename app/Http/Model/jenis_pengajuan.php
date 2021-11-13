<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class jenis_pengajuan extends Model
{
    protected $guarded = [];

    public function pengajuanSurat()
    {
        return $this->hasMany(pengajuanSurat::class, 'index_id', 'id');
    }
}
