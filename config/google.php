<?php

return [
    /*
    |----------------------------------------------------------------------------
    | Google application name
    |----------------------------------------------------------------------------
    */
    'application_name' => env('GOOGLE_APPLICATION_NAME', ''),

    /*
    |----------------------------------------------------------------------------
    | Google OAuth 2.0 access
    |----------------------------------------------------------------------------
    |
    | Keys for OAuth 2.0 access, see the API console at
    | https://developers.google.com/console
    |
    */
    'client_id'        => env('GOOGLE_CLIENT_ID', '876960254124-fdmu11nf3guc55gu81mrguhsg55b3336.apps.googleusercontent.com'),
    'client_secret'    => env('GOOGLE_CLIENT_SECRET', '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'),
    'redirect_uri'     => env('GOOGLE_REDIRECT', 'https://docs.google.com/spreadsheets/d/1R-10SjNxSbhrX9CXZGxRH-MX4ANwQ9C7lmNCcX7tawk/edit?hl=id#gid=0'),
    'scopes'           => [\Google_Service_Sheets::DRIVE, \Google_Service_Sheets::SPREADSHEETS],
    //    'scopes'           => [\Google_Service_Sheets::DRIVE_READONLY, \Google_Service_Sheets::SPREADSHEETS_READONLY],
    'access_type'      => 'offline',
    'approval_prompt'  => 'force',
    'prompt'           => 'consent', //"none", "consent", "select_account" default:none

    /*
    |----------------------------------------------------------------------------
    | Google developer key
    |----------------------------------------------------------------------------
    |
    | Simple API access key, also from the API console. Ensure you get
    | a Server key, and not a Browser key.
    |
    */
    'developer_key'    => env('GOOGLE_DEVELOPER_KEY', ''),

    /*
    |----------------------------------------------------------------------------
    | Google service account
    |----------------------------------------------------------------------------
    |
    | Set the credentials JSON's location to use assert credentials, otherwise
    | app engine or compute engine will be used.
    |
    */
    'service'          => [
        /*
        | Enable service account auth or not.
        */
        'enable' => env('GOOGLE_SERVICE_ENABLED', false),

        /*
        | Path to service account json file
        */
        'file'   => env('GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION', storage_path('speedy-rite-336210-0a99f556e95a.json')),
    ],

    /*
    |----------------------------------------------------------------------------
    | Additional config for the Google Client
    |----------------------------------------------------------------------------
    |
    | Set any additional config variables supported by the Google Client
    | Details can be found here:
    | https://github.com/google/google-api-php-client/blob/master/src/Google/Client.php
    |
    | NOTE: If client id is specified here, it will get over written by the one above.
    |
    */
    'config'           => [],
];