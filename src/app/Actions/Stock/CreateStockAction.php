<?php

namespace App\Actions\Stock;

use App\DataTransferObjects\Stock\StockData;
use App\Models\Stock;

final class CreateStockAction
{
    /**
     * @param $datum
     * @return Stock
     */
    public static function execute($datum): Stock
    {
        $data = StockData::from($datum);

        return Stock::create(
            [
                'date' => $data->date,
                'last_change_date' => $data->last_change_date,
                'supplier_article' => $data->supplier_article,
                'tech_size' => $data->tech_size,
                'barcode' => $data->barcode,
                'quantity' => $data->quantity,
                'is_supply' => $data->is_supply,
                'is_realization' => $data->is_realization,
                'quantity_full' => $data->quantity_full,
                'warehouse_name' => $data->warehouse_name,
                'in_way_to_client' => $data->in_way_to_client,
                'in_way_from_client' => $data->in_way_from_client,
                'nm_id' => $data->nm_id,
                'subject' => $data->subject,
                'category' => $data->category,
                'brand' => $data->brand,
                'sc_code' => $data->sc_code,
                'price' => $data->price,
                'discount' => $data->discount,
            ],
        );
    }
}
