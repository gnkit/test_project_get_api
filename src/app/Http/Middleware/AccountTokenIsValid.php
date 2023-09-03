<?php

namespace App\Http\Middleware;

use App\Actions\Token\ExistsTokenAction;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccountTokenIsValid
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!ExistsTokenAction::execute($request->input('token'))) {
            return response()->json([
                'message' => 'Token is incorrect!'
            ], 403);
        }

        return $next($request);
    }
}
