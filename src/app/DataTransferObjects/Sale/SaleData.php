<?php

namespace App\DataTransferObjects\Sale;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

final class SaleData extends Data
{
    /**
     * @param int|null $id
     * @param string $g_number
     * @param Carbon $date
     * @param Carbon $last_change_date
     * @param string $supplier_article
     * @param string $tech_size
     * @param int $barcode
     * @param int $total_price
     * @param int $discount_percent
     * @param int $is_supply
     * @param int $is_realization
     * @param int $promo_code_discount
     * @param string $warehouse_name
     * @param string $country_name
     * @param string $oblast_okrug_name
     * @param string $region_name
     * @param int $income_id
     * @param string $sale_id
     * @param int $odid
     * @param int $spp
     * @param int $for_pay
     * @param int $finished_price
     * @param int $price_with_disc
     * @param int $nm_id
     * @param string $subject
     * @param string $category
     * @param string $brand
     * @param int $is_storno
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly string $g_number,
        public readonly Carbon $date,
        public readonly Carbon $last_change_date,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly int    $barcode,
        public readonly int    $total_price,
        public readonly int    $discount_percent,
        public readonly int    $is_supply,
        public readonly int    $is_realization,
        public readonly int    $promo_code_discount,
        public readonly string $warehouse_name,
        public readonly string $country_name,
        public readonly string $oblast_okrug_name,
        public readonly string $region_name,
        public readonly int    $income_id,
        public readonly string $sale_id,
        public readonly int    $odid,
        public readonly int    $spp,
        public readonly int    $for_pay,
        public readonly int    $finished_price,
        public readonly int    $price_with_disc,
        public readonly int    $nm_id,
        public readonly string $subject,
        public readonly string $category,
        public readonly string $brand,
        public readonly int    $is_storno,
    )
    {
    }
}
