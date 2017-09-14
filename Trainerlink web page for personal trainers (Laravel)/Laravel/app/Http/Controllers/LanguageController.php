<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * Switch the current language
     *
     * @param $lang Language to switch to
     * @return Redirects to the previous page
     */
    public function switchLanguage($lang)
    {
        if (array_key_exists($lang, Config::get('app.locales')))
        {
            Session::set('applocale', $lang);
        }

        return Redirect::back();
    }
}
