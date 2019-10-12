<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\EloquentUser;

class UserController extends Controller
{
    /**
     * @var EloquentUser
     */
    private $userRepository;
    /**
     * UserController constructor.
     */
    public function __construct(EloquentUser $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return $this->userRepository->getAll();
    }
}
