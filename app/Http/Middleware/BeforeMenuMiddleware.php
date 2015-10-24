<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Contracts\MenuContract;

class BeforeMenuMiddleware
{
    protected $menuCon;
    public function __construct(MenuContract $menuCon){
        $this->menuCon = $menuCon;
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
        $user_menus = $this->menuCon->getUserMenu();

        view()->share('user_menus', $user_menus);
        
        return $next($request);
    }
}
