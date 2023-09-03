<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'account_id',
        'income_id',
        'number',
        'date',
        'last_change_date',
        'supplier_article',
        'tech_size',
        'barcode',
        'quantity',
        'total_price',
        'date_close',
        'warehouse_name',
        'nm_id',
        'status',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'date' => 'date:Y-m-d',
        'last_change_date' => 'date:Y-m-d',
        'date_close' => 'date:Y-m-d',
    ];
}
