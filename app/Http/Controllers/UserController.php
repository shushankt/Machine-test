<?php


namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
     /**
     * Remove the specified user.
     *
     * @param int $id
     * @return  \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('home');

    }
}
