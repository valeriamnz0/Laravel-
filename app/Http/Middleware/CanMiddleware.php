<?php

namespace App\Http\Middleware;

use Closure;

class CanMiddleware
{
    public function handle($request, Closure $next, $ability, ...$models)
    {
        if (!$this->can($request->user(), $ability, $models)) {
            return redirect()->to('/')->with('forbidden', 'No tienes permisos para ver esta pantalla');
        }
        return $next($request);
    }

    private function can($user, $ability, $abilities)
    {
        if (!$user->can($ability)) {
            foreach ($abilities as $ability) {
                if ($user->can($ability)) {
                    return true;
                }
            }
            return false;
        }
        return true;
    }
}
