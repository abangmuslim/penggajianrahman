<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model

    {
        use HasFactory;
        protected $fillable=['name','hp','alamat'];

        public function penggajian():HasMany
    {
        return $this->hasMany(Penggajian::class);
    }

    }
