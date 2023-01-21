<?php

namespace App\Http\Controllers;


use App\Http\Requests\Users\RegisterUserRequest;
use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param RegisterUserRequest $request
     * @param UserRepositoryInterface $userRepository
     * @return RedirectResponse
     */
    public function register(RegisterUserRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $user = $userRepository->findUserByPhone($request['phone']);

        if (! $user)
        {
            $user = $userRepository->create(
                [
                    'username'   => $request['username'],
                    'phone'      => $request['phone'],
                    'token'      => generate_unique_token(),
                    'expired_at' => Carbon::now()->addDays(7),
                ]
            );

            return redirect()->route('a.index', [ 'token' => $user->token ]);
        }

        return redirect()->route('home')->with('warning', 'User already exists');
    }
}
