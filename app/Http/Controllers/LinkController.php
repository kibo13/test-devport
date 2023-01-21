<?php

namespace App\Http\Controllers;


use App\Http\Requests\DeactivateLinkRequest;
use App\Http\Requests\GenerateLinkRequest;
use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    public function generate(GenerateLinkRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $user = $userRepository->getUserByToken($request['token']);

        $user->update(
            [
                'token'      => generate_unique_token(),
                'expired_at' => Carbon::now()->addDays(7),
            ]
        );

        return redirect()->route('a.index', [ 'token' => $user->token ]);
    }

    public function deactivate(DeactivateLinkRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $user = $userRepository->getUserByToken($request['token']);

        $user->update(
            [
                'is_active' => 0,
            ]
        );

        return redirect()->back();
    }
}
