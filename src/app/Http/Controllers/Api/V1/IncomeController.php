<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Income\GetAllIncomeAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $data = GetAllIncomeAction::execute($request->input('username'), $request->input('date'));

        return response()->json(['data' => $data]);
    }
}
