<?php

namespace Modules\Passwords\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Modules\Passwords\Models\Password;


class PasswordsRepository
{
    public function store(Request $request):Password {
        $password = Password::create([
            'customer_id' => $request->customer,
            'name' => $request->name,
            'type' => $request->type,
            'host' => $request->host,
            'login' => Crypt::encrypt($request->login),
            'password' => Crypt::encrypt($request->password),
            'notest' => $request->notes
        ]);

        return $password;
    }
}
