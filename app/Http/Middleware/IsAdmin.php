<?php namespace App\Http\Middleware;
use Closure;
//use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class IsAdmin {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // return $next($request);
        $user = Auth::user();
        if ($user && $user->isAdmin===true)
        {
            return $next($request);
        }
        return redirect('/')->with('error','Nu aveti drepturi de administrator');
    }
}