<?php

namespace App\Models;

use App\Enums\RequestState;
use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property RequestState $state
 */
class Request extends Model
{
    use HasFactory, HasUlid;

    protected $fillable = [
        'state',
        'provider',
        'model',
        'prompt_text',
        'response_type',
        'response_schema',
        'temperature',
        'started_at',
        'finished_at',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'state' => RequestState::class,
    ];

    public function prompt(): BelongsTo
    {
        return $this->belongsTo(Prompt::class);
    }

    public function response(): HasOne
    {
        return $this->hasOne(Response::class);
    }
}
