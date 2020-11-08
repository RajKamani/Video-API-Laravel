<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    function loginMAN(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


      /*  $user = User::where('email', $request->email)->first();


        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }*/

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            $user = User::where('email', $request->email)->first();
            $token =  auth()->user()->createToken('Access-token')->plainTextToken;
            return response(
                [   "user_name"=>$user->name,
                    "email"=>$user->email,
                    'token'=> $token]
                ,Response::HTTP_OK);
        }


        return  response(
            [
                "error"=>"Login Failed."
            ]
            ,Response::HTTP_OK);

    }

    function register(Request $request)
    {
      $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status =   User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        if(!$status)
        {
            return response(
            [
                "error"=>"User Can not Register."
            ]
            ,Response::HTTP_BAD_REQUEST);
        }

         return response(
        [
            "status"=>"User Created.",
            "name" => $status->name
        ]
        ,Response::HTTP_CREATED);

    }

    function logoutMAN(Request $request)
    {

        $request->user()->tokens()->delete();
        return response(
            [
                "status"=> " LoggedOut."
            ]
            ,Response::HTTP_CREATED);

    }

}
