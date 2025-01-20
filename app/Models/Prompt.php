<?php

namespace App\Models;

use App\Traits\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prompt extends Model
{
    use HasUlid;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'prompt',
        'response_type',
        'response_schema'
    ];

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

}
