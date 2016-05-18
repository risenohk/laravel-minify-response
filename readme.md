## Laravel Minify Response
[![Latest Stable Version](https://poser.pugx.org/riseno/laravel-minify-response/v/stable)](https://packagist.org/packages/riseno/laravel-minify-response) [![Total Downloads](https://poser.pugx.org/riseno/laravel-minify-response/downloads)](https://packagist.org/packages/riseno/laravel-minify-response) [![License](https://poser.pugx.org/riseno/laravel-minify-response/license)](https://packagist.org/packages/riseno/laravel-minify-response)

Laravel minify response middleware that will filter all the spaces and make all the HTML tags in one line.

### Installation

Require this package with composer using the following command:

```bash
composer require riseno/laravel-minify-response
```

After updating composer, add the middleware to the `middlewareGroups` array in `app/http/Kernel.php` .

```php
protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Riseno\MinifyResponse\MinifyResponseMiddleware::class,
    ],
    ...
];
```

### License

The Laravel minify response middleware is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)