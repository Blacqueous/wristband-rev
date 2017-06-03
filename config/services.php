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
        'client_id' => 'ASURSFcCTrjrnnzIc4voe_cn5hq3Cl-Z941ftlVek_556jycvAn1Kmr4gSpVCWvjPMEIoCs8XnMucVBb',
        'secret' => 'ENTuLYrdTgyMWU8ZO5vFbab3_uzouyDyxfbXSrZGVKueGZA9lEG2uvT_rI1iIssO0cv5GxyWvdHOsra2',
        'settings' => [
            'mode' => env('PAYPAL_MODE', 'sandbox'),
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path() . '/logs/paypal.log',
            'log.LogLevel' => 'ERROR',
        ],
    ],

    'authorizenet' => [
        'name' => 'ANET_LOGIN',
        'key' => 'ANET_KEY',
    ],

];
