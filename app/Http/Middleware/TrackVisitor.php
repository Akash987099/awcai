<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $ua = $request->header('User-Agent');

        $today = Carbon::today()->toDateString();

        // Pehle check — same IP + same date exists ?
        $exists = DB::table('visitor_logs')
            ->where('ip_address', $ip)
            ->where('visit_date', $today)
            ->exists();

        // Agar record already exists → Insert mat karo
        if ($exists) {
            return $next($request);
        }

        // Device detect
        $device = $this->getDevice($ua);
        $browser = $this->getBrowser($ua);
        $os = $this->getOS($ua);

        // API for IP Details
        $response = Http::get("http://ip-api.com/json/{$ip}?fields=66846719")->json();

        // Insert only once per IP per day
        DB::table('visitor_logs')->insert([
            'ip_address' => $ip,
            'user_agent' => $ua,
            'device'     => $device,
            'browser'    => $browser,
            'os'         => $os,
            'isp'        => $response['isp'] ?? null,
            'country'    => $response['country'] ?? null,
            'region'     => $response['regionName'] ?? null,
            'city'       => $response['city'] ?? null,
            'is_proxy'   => $response['proxy'] ?? 0,
            'visit_date' => $today,
            'created_at' => now(),
        ]);

        return $next($request);
    }

    private function getDevice($ua)
    {
        if (preg_match('/mobile/i', $ua)) return "Mobile";
        if (preg_match('/tablet/i', $ua)) return "Tablet";
        return "Desktop";
    }

    private function getBrowser($ua)
    {
        if (preg_match('/Chrome/i', $ua)) return "Chrome";
        if (preg_match('/Firefox/i', $ua)) return "Firefox";
        if (preg_match('/Safari/i', $ua)) return "Safari";
        if (preg_match('/Edg/i', $ua)) return "Edge";
        if (preg_match('/OPR/i', $ua)) return "Opera";

        return "Unknown";
    }

    private function getOS($ua)
    {
        if (preg_match('/Windows/i', $ua)) return "Windows";
        if (preg_match('/Android/i', $ua)) return "Android";
        if (preg_match('/iPhone|iPad|iPod/i', $ua)) return "iOS";
        if (preg_match('/Mac OS/i', $ua)) return "MacOS";
        if (preg_match('/Linux/i', $ua)) return "Linux";

        return "Unknown";
    }
}
