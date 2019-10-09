<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Users\Repositories\UserRepository;
use Illuminate\Support\Arr;
class UsersController extends Controller
{
  /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var array
     */
    private $includes;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(
        UserRepository $userRepository,
        Request $request
    ) {
        $this->userRepository = $userRepository;
        $this->includes = $request->has('include') ? explode(',', $request->input('include')) : [];
    }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      if (request()->has('all')) {
            $users = $this->userRepository->get();
      } else {
            $users = $this->userRepository->paginate();
      }
      return response()->json($users);
  }
}
