<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        // 'key' => 'pk_test_L59T4T2utlwOMMVqxVGYnsRK',
        // 'secret' => 'sk_test_940FP89X8e9LGSDvt8YmHmGh',  
		'key' => 'pk_test_pRdwPEKj0oYbmXHRvZVGsado',
        'secret' => 'sk_test_yVvcYMrULSOETIaWZ3Kletkk',
    ],

];
