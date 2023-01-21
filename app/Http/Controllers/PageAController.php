<?php

namespace App\Http\Controllers;


use App\Http\Requests\Users\DeactivateLinkRequest;
use App\Http\Requests\Users\GenerateLinkRequest;
use App\Http\Requests\Users\GetHistoryRequest;
use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;

class PageAController extends Controller
{
    private function getUrl(): string
    {
        $http = Request::server('HTTP_X_FORWARDED_PROTO');
        $host = Request::server('HTTP_HOST');
        $path = Request::server('REQUEST_URI');

        return "{$http}://{$host}{$path}";
    }

    public function index($token, UserRepositoryInterface $userRepository)
    {
        $link = $this->getUrl();
        $user = $userRepository->getUserByToken($token);

        $isInvalidLink = $user->is_active == 0;
        $expiredDate   = $user->expired_at;
        $currentDate   = Carbon::now();
        $diffInDays    = $currentDate->diffInDays($expiredDate);

        if ($isInvalidLink || $diffInDays > 7)
        {
            return redirect()->route('home')->with('warning', 'Link is invalid');
        }

        return view('page-a', [
            'link' => $link,
            'user' => $user,
        ]);
    }

    public function generateLink(GenerateLinkRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
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

    public function deactivateLink(DeactivateLinkRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $user = $userRepository->getUserByToken($request['token']);

        $user->update(
            [
                'is_active' => 0,
            ]
        );

        return redirect()->back();
    }

    public function getHistory(GetHistoryRequest $request, UserRepositoryInterface $userRepository)
    {
        $user = $userRepository->getUserByToken($request['token']);

        return view('history', [
            'histories' => $user->histories,
            'token'     => $user->token,
        ]);
    }
}
