Taiga SDK
=================================================
TaigaSDK is a PHP client library to work with
[Taiga REST API](https://taigaio.github.io/taiga-doc/dist/api.html).


Installation
-------------------------------------------------
SDK has been written in PHP 5.5 and has no dependencies on external packages.
You only have to ensure that curl and openssl extensions (that are part of
standard PHP distribution) are enabled in your PHP installation.

The project attempts to comply with PSR-4 specification for autoloading classes from file paths. 
As a namespace prefix is 'Taiga\' with base directory '{your-installation-dir}/'.

But if not using PSR-4 the installation is as easy as downloading the package and storing it
under any location that will be available for including by
```php
    require_once '{your-installation-dir}/Taiga/Autoloader.php';
```

in your project (see examples below).

Installation with Composer
-------------------------------------------------
You can use Taiga SDK library as a dependency in your project with Composer. A composer.json file is available in the repository and it has been referenced on packagist. 

The installation with Composer is easy, reliable : 
Step 1 - Add the Taiga SDK as a dependency in your composer.json file as follow :
```json
    "require": {
        ...
        "taiga/php-sdk": "^1.0"
    },
```

Step 2 - Update your dependencies with Composer

    you@yourhost:/path/to/project$ php composer.phar update taiga/php-sdk

The Library has been added into your dependencies and ready to be used.

License
-------------------------------------------------
TaigaSDK is distributed under MIT license, see LICENSE file.


Contacts
-------------------------------------------------
Report bugs or suggest features using
[issue tracker at GitHub](https://github.com/AppVentus/taiga-php-sdk/issues).

Authentication
-------------------------------------------------

To authenticate requests an http header called "Authorization" with this format:

```
Authorization: Bearer ${AUTH_TOKEN}
```

Follow these instructions to [generate your token](https://taigaio.github.io/taiga-doc/dist/api.html#auth-normal-login)