<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MataPelajaran extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id_mata_pelajaran';

    protected $fillable = [
        'kode_mapel',
        'nama_mapel',
        'jumlah_jp'
    ];

    public function mengajar():HasMany {
        return $this->hasMany(Mengajar::class, 'id_mata_pelajaran', 'id_mata_pelajaran');
    }
}
