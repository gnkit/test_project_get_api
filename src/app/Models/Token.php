<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Token extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'account_id',
        'api_service_id',
        'value',
    ];

    /**
     * @return BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * @return BelongsTo
     */
    public function apiService(): BelongsTo
    {
        return $this->belongsTo(ApiService::class);
    }

    /**
     * @return HasMany
     */
    public function tokenTypes(): HasMany
    {
        return $this->hasMany(TokenType::class);
    }
}