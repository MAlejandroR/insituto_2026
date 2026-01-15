<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $lang)
    {
        session()->put('lang', $lang);
        app()->setLocale($lang);
        return redirect()->back();


        //
    }
}
