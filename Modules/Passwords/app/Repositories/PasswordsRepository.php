<?php

namespace Modules\Passwords\Repositories;

use Illuminate\Support\Facades\Crypt;
use Modules\Passwords\Http\Requests\PasswordRequest;
use Modules\Passwords\Models\Password;

class PasswordsRepository
{
    public function getOne(int $id): Password
    {
        $password = Password::findOrFail($id);

        return $password;
    }

    public function store(PasswordRequest $request): Password
    {
        $password = Password::create([
            'customer_id' => $request->customer,
            'name' => $request->name,
            'type' => $request->type,
            'host' => $request->host,
            'login' => Crypt::encrypt($request->login),
            'password' => Crypt::encrypt($request->password),
            'port' => $request->port,
            'notes' => $request->notes,
        ]);

        return $password;
    }
}
