<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Token extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'account_id',
        'api_service_id',
        'token_type_id',
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
     * @return HasOne
     */
    public function tokenType(): HasOne
    {
        return $this->hasOne(TokenType::class);
    }
}
