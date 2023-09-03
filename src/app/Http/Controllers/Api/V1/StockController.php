<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Stock\GetAllStockAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = GetAllStockAction::execute($request->input('username'), $request->input('date'));

        return response()->json(['data' => $data]);
    }
}
