<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detilpenggajian extends Model
{
    protected $fillable=['penggajian_id','gaji_id','qty','nominal'];
    use HasFactory;

    public function penggajian():BelongsTo
    {
        return $this->belongsTo(Penggajian::class);
    }

    public function gaji():BelongsTo
    {
        return $this->belongsTo(Gaji::class);
    }
}

