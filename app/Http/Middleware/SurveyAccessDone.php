<?php

namespace App\Http\Middleware;
use App\InfoEmployee;
use Closure;

class SurveyAccessDone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $limitsurvey  = InfoEmployee::where('user_id',auth()->user()->id)->first();

        if ($limitsurvey != null) {
            return redirect('/');
        }
        return $next($request);
    }
}