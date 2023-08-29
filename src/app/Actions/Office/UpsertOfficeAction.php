<?php

namespace App\Actions\Office;

use App\DataTransferObjects\Office\OfficeData;
use App\Models\Office;

final class UpsertOfficeAction
{
    /**
     * @param $datum
     * @return Office
     */
    public static function execute($datum): Office
    {
        $data = OfficeData::validateAndCreate($datum);

        return Office::updateOrCreate(
            [
                'id' => $data->id,
            ],
            [
                'name' => $data->name,
                'company_id' => $data->company_id,
            ],
        );
    }
}
