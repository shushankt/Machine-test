<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Validator;


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

    public function update(User $user, Request $request)
    {
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required','min:10','max:10'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $toUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' =>  $request->address,
        ];

        //assigned therapist if user is patient
        if ((int)$request->user_role === 2) {
            $toUpdate['assigned_therapist'] = $request['assigned_therapist'];
        }

        $user->update($toUpdate);

        $user->role()->attach($request->user_role);
        return $user;
    }
}
