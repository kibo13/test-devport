<?php

namespace App\Http\Controllers;


use App\Http\Requests\GetHistoryRequest;
use App\Repositories\Users\UserRepositoryInterface;

class HistoryController extends Controller
{
    public function index(GetHistoryRequest $request, UserRepositoryInterface $userRepository)
    {
        $user = $userRepository->getUserByToken($request['token']);

        return view('history', [
            'histories' => $user->getLatestGameResults,
            'token'     => $user->token,
        ]);
    }
}
