<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChallengeController extends Controller
{
    /**
     * @param $id integer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $challenge = Challenge::find($id);
        if (!$challenge)
        {
            abort(404);
        }
        return view('challenge', ['challenge' => $challenge]);
    }

    /**
     * @param Request $request
     * @param $id integer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submit(Request $request, $id)
    {
        $challenge = Challenge::find($id);
        if (!$challenge)
        {
            abort(404);
            return;
        }
        if (!$request)
        {
            return redirect(route('home'))->with('session', 'a');
        }
        if ($request->input('flag') !== $challenge->flag)
        {
            return redirect(route('challenge', ['id' => $id]))->with('error', 'Invalid flag...');
        }
        $user = User::find(Auth::id());
        if (count($user->solves()->where('id', '=', $id)->get()) === 0)
        {
            $user->solves()->attach($challenge);
            $user->save();
        }
        return redirect(route('home'))->with('status', 'Correct!');
    }
}
