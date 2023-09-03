<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TokenType extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'api_service_id',
    ];

    /**
     * @return BelongsTo
     */
    public function token(): BelongsTo
    {
        return $this->belongsTo(ApiService::class);
    }

    /**
     * @return BelongsTo
     */
    public function apiService(): BelongsTo
    {
        return $this->belongsTo(ApiService::class);
    }
}
