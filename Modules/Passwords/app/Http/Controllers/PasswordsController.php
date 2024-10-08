<?php

namespace Modules\Passwords\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Passwords\Http\Requests\PasswordRequest;
use Modules\Passwords\Services\PasswordsService;

class PasswordsController extends Controller
{
    private $passwordsService;

    public function __construct(
        PasswordsService $passwordsService
    ) {
        $this->passwordsService = $passwordsService;
    }

    public function getPassword(int $id):Collection {
        $password = $this->passwordsService->getDecryptPassword($id);

        return $password;
    }

    public function store(PasswordRequest $request):RedirectResponse
    {
        $this->passwordsService->store($request);

        return redirect()->back();
    }

}
