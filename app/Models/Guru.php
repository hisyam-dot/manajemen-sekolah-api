<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'email',
        'no_hp'
    ];

    public function mengajar ():HasMany {
        return $this->hasMany(Mengajar::class, 'id_guru', 'id_guru');
    }

};
