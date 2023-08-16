<?php

namespace App\Actions\Sale;

use App\DataTransferObjects\Sale\SaleData;
use App\Models\Sale;

final class CreateSaleAction
{
    /**
     * @param $datum
     * @return Sale
     */
    public static function execute($datum): Sale
    {
        $data = SaleData::from($datum);

        return Sale::create(
            [
                'g_number' => $data->g_number,
                'date' => $data->date,
                'last_change_date' => $data->last_change_date,
                'supplier_article' => $data->supplier_article,
                'tech_size' => $data->tech_size,
                'barcode' => $data->barcode,
                'total_price' => $data->total_price,
                'discount_percent' => $data->discount_percent,
                'is_supply' => $data->is_supply,
                'is_realization' => $data->is_realization,
                'promo_code_discount' => $data->promo_code_discount,
                'warehouse_name' => $data->warehouse_name,
                'country_name' => $data->country_name,
                'oblast_okrug_name' => $data->oblast_okrug_name,
                'region_name' => $data->region_name,
                'income_id' => $data->income_id,
                'sale_id' => $data->sale_id,
                'odid' => $data->odid,
                'spp' => $data->spp,
                'for_pay' => $data->for_pay,
                'finished_price' => $data->finished_price,
                'price_with_disc' => $data->price_with_disc,
                'nm_id' => $data->nm_id,
                'subject' => $data->subject,
                'category' => $data->category,
                'brand' => $data->brand,
                'is_storno' => $data->is_storno,
            ],
        );
    }
}
