<?php

namespace App\Actions\Income;

use App\DataTransferObjects\Income\IncomeData;
use App\Models\Income;

final class CreateIncomeAction
{
    /**
     * @param $datum
     * @return Income
     */
    public static function execute($datum): Income
    {
        $data = IncomeData::from($datum);

        return Income::create(
            [
                'income_id' => $data->income_id,
                'number' => $data->number,
                'date' => $data->date,
                'last_change_date' => $data->last_change_date,
                'supplier_article' => $data->supplier_article,
                'tech_size' => $data->tech_size,
                'barcode' => $data->barcode,
                'quantity' => $data->quantity,
                'total_price' => $data->total_price,
                'date_close' => $data->date_close,
                'warehouse_name' => $data->warehouse_name,
                'nm_id' => $data->nm_id,
                'status' => $data->status,
            ],
        );
    }
}
