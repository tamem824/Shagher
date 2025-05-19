<?php

namespace App\Http\Middleware;

use App\RuleEnums;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Company
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $userType = auth()->user()->user_type;

            if ($userType === RuleEnums::Company->value && !$request->routeIs('company.*')) {
                return redirect()->route('company.profile');
            }

            if (
                ($userType === RuleEnums::Admin->value || $userType === RuleEnums::Freelance->value) &&
                !$request->routeIs('admin.dashboard')
            ) {
                return redirect()->route('guest.home');
            }
        }

        return $next($request);
    }

}
