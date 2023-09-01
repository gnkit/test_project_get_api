<?php

namespace App\Actions\TokenType;

use App\Models\TokenType;
use Illuminate\Support\Collection;


final class GetIdNameTokenTypeAction
{
    /**
     * @param $name
     * @param $id
     * @return Collection
     */
    public static function execute($name, $id): Collection
    {
        return TokenType::pluck($name, $id);
    }
}
