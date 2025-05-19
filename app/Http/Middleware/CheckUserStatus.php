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
            $user = auth()->user();
            $route = $request->route();

            $redirectRoutes = [
                RuleEnums::Admin->value => [
                    'allowed' => 'admin.*',
                    'redirect' => 'admin.dashboard',
                ],
                RuleEnums::Company->value => [
                    'allowed' => 'company.*',
                    'redirect' => 'company.profile',
                ],
                RuleEnums::Freelance->value => [
                    'allowed' => 'guest.home',
                    'redirect' => 'guest.home',
                ],
            ];

            $userType = $user->user_type;

            if (isset($redirectRoutes[$userType])) {
                $allowed = $redirectRoutes[$userType]['allowed'];
                $redirect = $redirectRoutes[$userType]['redirect'];

                if (!$request->routeIs($allowed)) {
                    return redirect()->route($redirect);
                }
            }
        }

        return $next($request);
    }
}
