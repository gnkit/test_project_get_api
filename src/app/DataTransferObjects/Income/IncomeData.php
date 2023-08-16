<?php

namespace App\DataTransferObjects\Income;

use Illuminate\Support\Carbon;
use Spatie\LaravelData\Data;

final class IncomeData extends Data
{
    /**
     * @param int|null $id
     * @param int $income_id
     * @param string $number
     * @param Carbon $date
     * @param Carbon $last_change_date
     * @param string $supplier_article
     * @param string $tech_size
     * @param string $barcode
     * @param int $quantity
     * @param int $total_price
     * @param Carbon $date_close
     * @param string $warehouse_name
     * @param int $nm_id
     * @param string $status
     */
    public function __construct(
        public readonly ?int   $id,
        public readonly int    $income_id,
        public readonly string $number,
        public readonly Carbon $date,
        public readonly Carbon $last_change_date,
        public readonly string $supplier_article,
        public readonly string $tech_size,
        public readonly string $barcode,
        public readonly int    $quantity,
        public readonly int    $total_price,
        public readonly Carbon $date_close,
        public readonly string $warehouse_name,
        public readonly int    $nm_id,
        public readonly string $status,
    )
    {
    }
}
