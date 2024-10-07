<?php

namespace Modules\Passwords\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Passwords\Services\PasswordsService;

class PasswordsController extends Controller
{
    private $passwordsService;

    public function __construct(
        PasswordsService $passwordsService
    ) {
        $this->passwordsService = $passwordsService;
    }

    public function store(Request $request):RedirectResponse
    {
        $this->passwordsService->store($request);

        return redirect()->back();
    }

}
