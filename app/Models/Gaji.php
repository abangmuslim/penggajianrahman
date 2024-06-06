<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gaji extends Model
{
    use HasFactory;
    protected $fillable=['name','golongan','jabatan','nominal'];


    public function detilpenggajian():HasMany
    {
        return $this->hasMany(Detilpenggajian::class);
    }

}
