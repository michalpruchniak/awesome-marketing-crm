<?php

namespace Modules\Users\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Users\Repositories\UsersRepository;

class UsersService
{
    private $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    )
    {
        $this->usersRepository = $usersRepository;
    }

    public function getAll():Collection {
        $users = $this->usersRepository->getAll();

        return $users;
    }
}
