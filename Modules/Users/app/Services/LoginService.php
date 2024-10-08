<?php

namespace Modules\Users\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Http\Requests\LoginRequest;

class LoginService
{
    public function login(LoginRequest $request):void {
        $request->authenticate();
        $request->session()->regenerate();
    }

    public function destroy(Request $request):void {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
