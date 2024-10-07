<?php

namespace Modules\Passwords\Services;

use Illuminate\Http\Request;
use Modules\Passwords\Models\Password;
use Modules\Passwords\Repositories\PasswordsRepository;

class PasswordsService
{
    private $passwordsRepository;

    public function __construct(
        PasswordsRepository $passwordsRepository
    ) {
        $this->passwordsRepository = $passwordsRepository;
    }

    public function store(Request $request):Password {
        $passwords = $this->passwordsRepository->store($request);

        return $passwords;
    }
}
