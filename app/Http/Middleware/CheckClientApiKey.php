<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Customer; // your client/customer model

class CheckClientApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = $request->header('X-API-KEY') ?: $request->query('api_key');

        if (!$apiKey) {
            return response()->json([
                'error'   => true,
                'message' => 'API key missing'
            ], 401);
        }

        $client = Customer::where('api_key', trim($apiKey))->first();

        if (!$client) {
            return response()->json([
                'error'   => true,
                'message' => 'Invalid API key'
            ], 401);
        }

        $request->merge(['client' => $client]);

        return $next($request);
    }
}
