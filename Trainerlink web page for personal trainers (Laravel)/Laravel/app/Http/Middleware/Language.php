<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

class Language {

    public function __construct(Application $app, Redirector $redirector, Request $request) {
        $this->app = $app;
        $this->redirector = $redirector;
        $this->request = $request;
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
        if (Session::has('applocale') and
            array_key_exists(Session::get('applocale'), $this->app->config->get('app.locales')))
        {
            $this->app->setLocale(Session::get('applocale'));
        }
        else
        {
            $this->app->setLocale($this->app->config->get('app.fallback_locale'));
        }

        return $next($request);
    }

}