<?php

namespace Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Users\Repositories\UsersRepository;

class UsersController extends Controller
{
    private $users;

    public function __construct(
        UsersRepository $usersRepository
    ) {
        $this->users = $usersRepository;
    }

    public function index():View {
        return view('users::list')
        ->with('mainTitle', 'List of customers')
        ->with('headerTitle', 'List of customers')
        ->with('users', $this->users->getAll());
    }

}
