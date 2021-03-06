<?php

/** @var Router $router */

// Authentication Routes
use Illuminate\Routing\Router;

$router->group(
    ['prefix' => 'login', 'as' => 'login'],
    function () use ($router) {
        $router->get('/', 'LoginController@showLoginForm')->name('');
        $router->post('/', 'LoginController@login')->name('.post');
    }
);
$router->post('/logout', 'LoginController@logout')->name('logout');

// Password Reset Routes
$router->group(
    ['prefix' => 'password', 'as' => 'password.'],
    function () use ($router) {
        $router->group(
            ['prefix' => 'confirm', 'as' => 'confirm'],
            function () use ($router) {
                $router->get('/', 'ConfirmPasswordController@showConfirmForm')->name('');
                $router->post('/', 'ConfirmPasswordController@confirm')->name('.post');
            }
        );

        $router->group(
            ['prefix' => 'forget', 'as' => 'forget'],
            function () use ($router) {
                $router->get('/', 'ForgotPasswordController@showLinkRequestForm')->name('');
                $router->post('/', 'ForgotPasswordController@sendResetLinkEmail')->name('.post');
            }
        );

        $router->group(
            ['prefix' => 'reset', 'as' => 'reset'],
            function () use ($router) {
                $router->get('/{token}', 'ResetPasswordController@showResetForm')->name('');
                $router->post('/', 'ResetPasswordController@reset')->name('.post');
            }
        );
    }
);

// Registration Routes
$router->group(
    ['prefix' => 'register', 'as' => 'register'],
    function () use ($router) {
        $router->get('/', 'RegisterController@showRegistrationForm')->name('');
        $router->post('/', 'RegisterController@register')->name('.post');
    }
);

// Email Verification Routes
$router->group(
    ['prefix' => 'verify', 'as' => 'verification.'],
    function () use ($router) {
        $router->get('/', 'VerificationController@show')->name('notice');
        $router->get('/resend', 'VerificationController@resend')->name('resend');
        $router->get('/{id}/{hash}', 'VerificationController@verify')->name('verify');
    }
);
