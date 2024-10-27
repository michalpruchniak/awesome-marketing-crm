<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Users\Http\Requests\LoginRequest;
use Modules\Users\Services\LoginService;

class AuthController extends Controller
{
    private $loginService;

    public function __construct(
        LoginService $loginService
    ) {
        $this->loginService = $loginService;
    }

    public function login(): View
    {
        return view('users::login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $this->loginService->login($request);

        return redirect()->route('customers.list');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $this->loginService->destroy($request);

        return redirect('/');
    }
}
