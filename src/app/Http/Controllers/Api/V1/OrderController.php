<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Order\GetAllOrderAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = GetAllOrderAction::execute($request->input('username'), $request->input('date'));

        return response()->json(['data' => $data]);
    }
}
