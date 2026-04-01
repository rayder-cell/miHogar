<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class CustomUserProvider extends EloquentUserProvider
{
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        $query = $this->createModel()->newQuery();

        if (isset($credentials['correo'])) {
            $query->where('correo', $credentials['correo']);
        }

        return $query->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        $plain = $credentials['password'] ?? $credentials['contrasena'] ?? null;

        if (!$plain) return false;

        return Hash::check($plain, $user->getAuthPassword());
    }

    public function rehashPasswordIfRequired(Authenticatable $user, array $credentials, bool $force = false): void
    {
        // No hacer nada
    }
}