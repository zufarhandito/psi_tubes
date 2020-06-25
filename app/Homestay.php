<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestay';
    protected $fillable = ['nama_homestay', 'deskripsi', 'fasilitas', 'alamat_lengkap', 'id_kabupaten', 'id_user', 'is_verified', 'foto'];

    public function location(){
        return $this->belongsTo('App\Kabupaten', 'id_kabupaten');
    }
}
