<?php

namespace App\Http\Middleware;

use App\RuleEnums;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $userType = auth()->user()->user_type;

            if ($userType === RuleEnums::Admin->value && !$request->routeIs('admin.*')) {
                return redirect()->route('admin.dashboard');
            }

            if (
                ($userType === RuleEnums::Company->value || $userType === RuleEnums::Freelance->value) &&
                !$request->routeIs('guest.home')
            ) {
                return redirect()->route('guest.home');
            }
        }

        return $next($request);
    }

}
