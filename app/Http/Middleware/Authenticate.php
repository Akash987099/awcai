<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function unauthenticated($request, array $guards)
    {
        if ($request->expectsJson()) {
            throw new AuthenticationException('Unauthenticated.', $guards);
        }

        throw new AuthenticationException(
            'Unauthenticated.',
            $guards,
            $this->loginRoute($guards[0] ?? null, $request)
        );
    }

    protected function redirectTo(Request $request): ?string
    {
        return $this->loginRoute(null, $request);
    }

    private function loginRoute(?string $guard, Request $request): string
    {
        return match ($guard) {
            'admin' => route('admin.login'),
            'client' => route('panel.login'),
            'user' => route('user.login'),
            default => $request->is('admin/*')
                ? route('admin.login')
                : ($request->is('panel/user/*')
                    ? route('panel.login')
                    : route('user.login')),
        };
    }
}
