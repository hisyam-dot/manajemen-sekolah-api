<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mengajar extends Model
{
    protected $table = 'mengajar';
    protected $primaryKey = 'id_mengajar';

    protected $fillable = [
        'id_kelas',
        'id_guru',
        'id_mapel',
        'tahun_ajaran',
    ];

    public function guru():BelongsTo {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function kelas():BelongsTo {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function mataPelajaran():BelongsTo {
        return $this->belongsTo(MataPelajaran::class, 'id_mapel', 'id_mata_pelajaran');
    }
}
