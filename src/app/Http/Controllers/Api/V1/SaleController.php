<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Sale\GetAllSaleAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = GetAllSaleAction::execute($request->input('username'), $request->input('date'));

        return response()->json(['data' => $data]);
    }
}
