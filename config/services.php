<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'filepath' => [
        'prices' => [
            'wristband' => [
                'path' => 'uploads/prices/wristband/',
            ],
            'addon' => [
                'path' => 'uploads/prices/addon/',
            ],
            'shipping_domestic' => [
                'path' => 'uploads/prices/shipping_domestic/',
            ],
            'shipping_international' => [
                'path' => 'uploads/prices/shipping_international/',
            ],
            'production' => [
                'path' => 'uploads/prices/production/',
            ]
        ],
        'images' => [
            'temp' => [
                'path' => 'uploads/temp/',
            ],
            'order' => [
                'path' => 'uploads/temp/images/',
            ]
        ],
    ],

    'paypal' => [
        'client_id' => 'Aat-pItpUT7M8NRjurPbXHHV2xjr1OpeLstdx12i0Bf7RxFP_w3Tobz-e7LO4Z4c6-Gykyb9ed_3IfKW',
        'secret' => 'EKYfVgIpvcNUsX05JXkFacUdEz655PZJ6eLzgV1R5cyua0g7Js-UCO3Y9vgyxEoL6ByR2LxHxDkVBUOc',
        'settings' => [
            'mode' => env('PAYPAL_MODE', 'live'),
            'http.ConnectionTimeOut' => 10000,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR',
        ],
    ],

    'authorizenet' => [
        'name' => '7QX9k7vtJp38',
        'key' => '733N9khenL2E8fJ7',
        'sandbox' => false,
    ],

];
