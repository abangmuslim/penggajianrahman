<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penggajian extends Model
{
    use HasFactory;
    protected $fillable = ['invoice', 'pegawai_id', 'user_id', 'total'];

    public function detilpenggajian(): HasMany
    {
        return $this->hasMany(Detilpenggajian::class);
    }
    
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }
}
