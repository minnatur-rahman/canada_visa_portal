<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VisaPdf extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visa(): BelongsTo
    {
        return $this->belongsTo(VisaInfo::class);
    }
}
