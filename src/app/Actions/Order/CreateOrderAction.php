<?php

namespace App\Actions\Order;

use App\DataTransferObjects\Order\OrderData;
use App\Models\Order;

final class CreateOrderAction
{
    /**
     * @param $datum
     * @return Order
     * @var Order $order
     */
    public static function execute($datum): Order
    {
        $data = OrderData::from($datum);

        return Order::create(
            [
                'g_number' => $data->g_number,
                'date' => $data->date,
                'last_change_date' => $data->last_change_date,
                'supplier_article' => $data->supplier_article,
                'tech_size' => $data->tech_size,
                'barcode' => $data->barcode,
                'total_price' => $data->total_price,
                'discount_percent' => $data->discount_percent,
                'warehouse_name' => $data->warehouse_name,
                'oblast' => $data->oblast,
                'income_id' => $data->income_id,
                'odid' => $data->odid,
                'nm_id' => $data->nm_id,
                'subject' => $data->subject,
                'category' => $data->category,
                'brand' => $data->brand,
                'is_cancel' => $data->is_cancel,
                'cancel_dt' => $data->cancel_dt,
            ],
        );
    }
}
