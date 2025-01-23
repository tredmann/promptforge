<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $title
 * @property ?string $description
 * @property string $prompt
 * @property ?string $response_type
 * @property ?string $response_schema
 */
class Prompt extends Model
{
    use HasFactory;
    use HasUlid;

    protected $fillable = [
        'title',
        'description',
        'prompt',
        'response_type',
        'response_schema',
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

    public function endpoints(): HasMany
    {
        return $this->hasMany(Endpoint::class);
    }
}
