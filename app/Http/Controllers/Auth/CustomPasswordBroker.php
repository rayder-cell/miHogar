<?php

namespace App\Auth;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Contracts\Auth\CanResetPassword;

class CustomPasswordBroker extends PasswordBroker
{
    protected function getUser(array $credentials)
    {
        // Cambia 'email' por 'correo'
        if (isset($credentials['email'])) {
            $credentials['correo'] = $credentials['email'];
            unset($credentials['email']);
        }

        return $this->users->retrieveByCredentials($credentials);
    }
}