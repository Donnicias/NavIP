<?php
return [
    /**
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    |
    | The following are the default configs. You can change the configs as needed.
    | Mode: Defines the default auth mode to be used
    | Sync_Field: Defines the sync field to be marked on Nav side when sync is successful
    | Default_Sync_Value: This should be a boolean value. It states how the Sync_Field will be marked when sync is
    | successful
     */
    'Mode'=>'NTLM',
    'Sync_Field'=>'Web_Sync',
    'Default_Sync_Value'=>true,

    /**
    |--------------------------------------------------------------------------
    | Authentication Mode
    |--------------------------------------------------------------------------
    |
    | These are the auth modes that can be used with the package. You can configure
    | as many as needed. Two have been setup for you.
    |
    | BaseURL: Determines Nav Base URL
    | Username: This is the username used to authenticate the transaction request to Nav
    | Domain: For ntlm, include the user domain
    | Password: This is the password to be used with the username for authentication to Nav
    | Company: The company name as setup in Nav
    |
    */
    'Auth_Mode' => [
        'NTLM' => [
            'BaseURL' => '',
            'Company' => '',
            'Username' => '',
            'Domain' => '',
            'Password' => ''
        ],
        'BASIC' => [
            'BaseURL' => '',
            'Company' => '',
            'Username' => '',
            'Password' => ''
        ],
    ],
];
