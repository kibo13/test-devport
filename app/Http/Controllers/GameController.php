<?php

namespace App\Http\Controllers;


use App\Http\Requests\PlayGameRequest;
use App\Models\History;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    public function play(PlayGameRequest $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $user = $userRepository->getUserByToken($request['token']);
        $winningAmount = 0;
        $randomNumber = rand(1, 1000);
        $result = $randomNumber % 2 == 0 ? 'win' : 'lose';

        if ($result == 'win')
        {
            switch (true) {
                case $randomNumber > 900:
                    $winningAmount = $randomNumber * 0.7;
                    break;

                case $randomNumber > 600:
                    $winningAmount = $randomNumber * 0.5;
                    break;

                case $randomNumber > 300:
                    $winningAmount = $randomNumber * 0.3;
                    break;

                default:
                    $winningAmount = $randomNumber * 0.1;
                    break;
            }
        }

        History::query()->create(
            [
                'user_id' => $user->id,
                'result'  => $result,
                'number'  => $randomNumber,
                'amount'  => $winningAmount,
            ]
        );

        return redirect()->back()->with(
            [
                'game'   => $result,
                'number' => $randomNumber,
                'amount' => $winningAmount
            ]
        );
    }
}
