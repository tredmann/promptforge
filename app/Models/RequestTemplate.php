<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestTemplate extends Model
{
    use HasFactory, HasUlid;

    protected $fillable = [
        'provider',
        'model',
        'has_api',
        'has_frontend',
    ];

    protected $casts = [
        'has_api' => 'boolean',
        'has_frontend' => 'boolean',
    ];

    public function prompt(): BelongsTo
    {
        return $this->belongsTo(Prompt::class);
    }
}
