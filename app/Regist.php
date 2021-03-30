<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regist extends Model
{
    protected $fillable = [
        'nis', 'nama', 'jns_kelamin', 'tgl_lahir', 'asal_sekolah',
        'kelas', 'jurusan', 'alamat', 'temp_lahir'
    ];
}
