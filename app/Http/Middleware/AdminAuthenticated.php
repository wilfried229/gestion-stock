<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * The authenticated user
     * @var User $user
     */
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->user == null) {
            return redirect('login');
        }
        if ($this->user != null && $this->user->role != env('ROLE_ADMIN')) {
            abort(403);
        }

        return $next($request);
    }
}
