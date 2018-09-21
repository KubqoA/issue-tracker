<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Hosting Service Settings
     |--------------------------------------------------------------------------
     |
     | Issue tracker is by default set to use the Gitea API, if you want to use
     | any other git repository hosting service please specify it here.
     |
     | Currently supported options are: gitea, gogs
     |
     */

    'hosting_service' => 'gitea',

    /*
     |--------------------------------------------------------------------------
     | API settings
     |--------------------------------------------------------------------------
     |
     | This package uses API of your selected hosting service to add the issues
     | to the repo. For this the package requires the root url of your hosting
     | service, the repository name and the repository owner's name. We also
     | need access token so we can use the api
     |
     */

    'api' => [
        'gitea' => [
            'url' => env('ISSUE_TRACKER_URL', 'https://try.gitea.io'),
            'owner_name' => env('ISSUE_TRACKER_OWNER_NAME'),
            'repository_name' => env('ISSUE_TRACKER_REPOSITORY_NAME'),
            'access_token' => env('ISSUE_TRACKER_ACCESS_TOKEN'),
        ],
    ],

];
