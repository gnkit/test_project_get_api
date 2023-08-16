<?php

namespace App\DataTransferObjects\Order;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

final class OrderData extends Data
{
    /**
     * @param int|null $id
     * @param string $g_number
     * @param Carbon $date
     * @param Carbon $last_change_date
     * @param string $supplier_article
     * @param string $tech_size
     * @param string $barcode
     * @param int $total_price
     * @param int $discount_percent
     * @param string $warehouse_name
     * @param string $oblast
     * @param int $income_id
     * @param int $odid
     * @param int $nm_id
     * @param string $subject
     * @param string $category
     * @param string $brand
     * @param int $is_cancel
     * @param string|null $cancel_dt
     */
    public function __construct(
        public readonly ?int    $id,
        public readonly string  $g_number,
        public readonly Carbon  $date,
        public readonly Carbon  $last_change_date,
        public readonly string  $supplier_article,
        public readonly string  $tech_size,
        public readonly string  $barcode,
        public readonly int     $total_price,
        public readonly int     $discount_percent,
        public readonly string  $warehouse_name,
        public readonly string  $oblast,
        public readonly int     $income_id,
        public readonly int     $odid,
        public readonly int     $nm_id,
        public readonly string  $subject,
        public readonly string  $category,
        public readonly string  $brand,
        public readonly int     $is_cancel,
        public readonly ?string $cancel_dt,
    )
    {
    }
}
