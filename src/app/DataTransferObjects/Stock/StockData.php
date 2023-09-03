<?php

namespace App\DataTransferObjects\Stock;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

final class StockData extends Data
{
    /**
     * @param int|null $id
     * @param int|null $account_id
     * @param Carbon $date
     * @param Carbon $last_change_date
     * @param string $supplier_article
     * @param string $tech_size
     * @param string $barcode
     * @param int $quantity
     * @param int $is_supply
     * @param int $is_realization
     * @param int $quantity_full
     * @param string $warehouse_name
     * @param int $in_way_to_client
     * @param int $in_way_from_client
     * @param int $nm_id
     * @param string $subject
     * @param string $category
     * @param string $brand
     * @param string $sc_code
     * @param int $price
     * @param int $discount
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly ?int   $account_id,
        public readonly Carbon $date,
        public readonly Carbon $last_change_date,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly string $barcode,
        public readonly int    $quantity,
        public readonly int    $is_supply,
        public readonly int    $is_realization,
        public readonly int    $quantity_full,
        public readonly string $warehouse_name,
        public readonly int    $in_way_to_client,
        public readonly int    $in_way_from_client,
        public readonly int    $nm_id,
        public readonly string $subject,
        public readonly string $category,
        public readonly string $brand,
        public readonly string $sc_code,
        public readonly int    $price,
        public readonly int    $discount,
    )
    {
    }
}
