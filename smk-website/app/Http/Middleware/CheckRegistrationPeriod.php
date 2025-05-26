<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RegistrationSetting;
use Symfony\Component\HttpFoundation\Response;

class CheckRegistrationPeriod
{
    public function handle(Request $request, Closure $next): Response
    {
        $settings = RegistrationSetting::first();
        
        if (!$settings) {
            return redirect()->route('home')->with('error', 'Pendaftaran belum dibuka.');
        }

        if (!$settings->isRegistrationOpen()) {
            $message = $settings->registration_closed_message ?? 'Pendaftaran sudah ditutup.';
            if ($settings->registration_start && now()->lt($settings->registration_start)) {
                $message = 'Pendaftaran akan dibuka pada ' . $settings->registration_start->format('d F Y H:i');
            } elseif ($settings->registration_end && now()->gt($settings->registration_end)) {
                $message = 'Pendaftaran sudah ditutup pada ' . $settings->registration_end->format('d F Y H:i');
            }
            
            return redirect()->route('home')->with('error', $message);
        }

        return $next($request);
    }
} 