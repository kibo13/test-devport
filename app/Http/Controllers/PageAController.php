<?php

namespace App\Http\Controllers;


use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;

class PageAController extends Controller
{
    public function index($token, UserRepositoryInterface $userRepository)
    {
        $user = $userRepository->getUserByToken($token);

        $expiredDate = $user->expired_at;
        $currentDate = Carbon::now();
        $diffInDays  = $currentDate->diffInDays($expiredDate);

        if ($diffInDays > 7)
        {
            return redirect()->route('home')->with('warning', 'Link is invalid');
        }

        return view('page-a', compact('user'));
    }
}
