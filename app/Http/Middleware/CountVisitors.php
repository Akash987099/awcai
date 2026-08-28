<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountVisitors
{
    public function handle($request, Closure $next)
    {
        $today = Carbon::today()->toDateString();

        $record = DB::table('daily_visitors')->where('visit_date', $today)->first();

        if ($record) {
            DB::table('daily_visitors')
                ->where('visit_date', $today)
                ->increment('visit_count');
        } else {
            DB::table('daily_visitors')->insert([
                'visit_date' => $today,
                'visit_count' => 1
            ]);
        }

        return $next($request);
    }
}
