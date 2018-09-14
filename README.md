# Dynamics Nav Laravel Integration Package

This is a Laravel package for the integration between Microsoft Dynamics Nav and Laravel Applications. 
The package allows a user to perform CRUD operations with Nav API.


## Installation

Pull in the package through Composer.

This script will copy the default configuration file to a config folder in the root directory of your project.
Now proceed to require the package.

### General Install

Run `composer require donnicias/nav_ip` to get the latest stable version of the package.

### Laravel

When using Laravel 5.5+, the package will automatically register. For laravel 5.4 and below,
include the service provider and its alias within your `config/app.php`.

```php
'providers' => [
    \donnicias\nav_ip\Provider\NavIPServiceProvider::class
],

'aliases' => [
    'Nav' => \donnicias\nav_ip\Facades\Nav::class
],
```

Publish the package specific config using:
```bash
php artisan vendor:publish
```

### Configuration

The package allows you to specify your configs. The configs are mandatory.

```
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
            'BaseURL' => 'http://desktop-e82non2:8047/NavDev/WS/',
            'Company' => 'LAW%20SOCIETY%20OF%20KENYA',
            'Username' => 'Don',
            'Domain' => 'DESKTOP-E82NON2',
            'Password' => '7231'
        ],
        'BASIC' => [
            'BaseURL' => '',
            'Company' => '',
            'Username' => '',
            'Password' => ''
        ],
    ],
];
```

Currently the package supports NTLM Authentication only. 

## Usage
The following demonstrates how to use the package

```php
namespace App\Http\Controllers;
use donnicias\nav_ip\Facades\Nav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntegrationController extends Controller
{
    public function index(){
        $payments = Nav::Read(null,'Payments',null,1);
        $blob = Nav::Read(['returnString'=>'','payload'=>'110415','service'=>'RENEWALINVOICE'],'BlobHandling','ProcessBlobs',null);
    }
}

```
## License

This Package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
