<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => env('364923841304295'),
        'client_secret' => env('46428bde0628c2e16731723efb027be5'),
        'redirect' => 'http://localhost:8000/login/facebook/callback'. '/oauth/facebook/callback',

    ],
    'google' => [
    'client_id'     => env('183311651256-j0a3ph7utv0i7s5dsf2pjmnvsel4nlm8.apps.googleusercontent.com'),
    'client_secret' => env('95LHOgJzX_ZGffqGU7JKosH4'),
    'redirect'      => env('http://localhost:8000/googlelogin/callback/google') . '/oauth/google/callback',
],

];
