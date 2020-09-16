<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Illuminate\Support\Facades\Auth;
class Lang
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
       
        if(!$this->validateLang($request->route('lang')))
           return redirect('/404')->with('status', 'Недоступный язык');
        return $next($request);
    }
    private function validateLang($lang)
    {   
        if($lang == 'ru' ) {
            $lang = '';
        }
        if($lang == '')
        {
            App::setLocale('ru');
            return true;
        }
        else
        {
            if($lang == 'kk')
            {
                App::setLocale('kk');
                return true;
            }
            if($lang == 'en')
            {
                App::setLocale('en');
                return true;
            }

        }
        return false;

    }
}
