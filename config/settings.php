<?php

return [

    /*
    |--------------------------------------------------------------------------
    | User Specific settings for appearance
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'layout' => [
         'dir' => env('APP_DIRECTION', 'ltr'),
         'navbar-class' => config('settings.layout.dir') == 'rtl' ? 'rtl-navbar' : ''
        ],

];
