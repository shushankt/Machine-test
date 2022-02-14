<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Remove the specified user.
     *
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function delete(User $user, Request $request)
    {
        if($request->user()->id === $user->id) {
            return redirect()->route('home');
        }
        $user->delete();
        return redirect()->route('home');

    }
}
