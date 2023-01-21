<?php

namespace App\Http\Controllers;


use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
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
}
