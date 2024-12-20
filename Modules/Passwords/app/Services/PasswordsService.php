<?php

namespace Modules\Passwords\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Modules\Histories\Services\HistoriesService;
use Modules\Passwords\Http\Requests\PasswordRequest;
use Modules\Passwords\Models\Password;
use Modules\Passwords\Repositories\PasswordsRepository;

class PasswordsService
{
    private $passwordsRepository;

    private $historiesService;

    public function __construct(
        PasswordsRepository $passwordsRepository,
        HistoriesService $historiesService
    ) {
        $this->passwordsRepository = $passwordsRepository;
        $this->historiesService = $historiesService;
    }

    public function getDecryptPassword(int $id): Collection
    {
        $password = $this->passwordsRepository->getOne($id);

        $passwordCollection = new Collection([
            'host' => $password->host,
            'port' => $password->port,
            'login' => Crypt::decrypt($password->login),
            'password' => Crypt::decrypt($password->password),
        ]);

        $this->historiesService->store(Auth::id(), $password->customer_id, Auth::user()->name.' user got password '.$password->name.' customer '.$password->customer->name);

        return $passwordCollection;
    }

    public function store(PasswordRequest $request): Password
    {
        $password = $this->passwordsRepository->store($request);

        $this->historiesService->store(Auth::id(), $password->customer_id, 'The password '.$password->name.' was added by '.Auth::user()->name);

        return $password;
    }
}
