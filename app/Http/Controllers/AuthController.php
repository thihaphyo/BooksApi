<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoginUserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class AuthController extends Controller
{

    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'udid' => $request->udid,
            'fbid' => $request->fbid,
            'gid' => $request->gid,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

    }


    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {

        $credentials = request(['fbid']);

        if (count(User::where('fbid', $request->fbid)->get()) > 0) {

            $id = (User::where('fbid', $request->fbid)->get())[0]->id;

            if (!Auth::loginUsingId($id)) {

                $user = new User([
                    'name' => $request->name,
                    'email' => $request->email,
                    'udid' => $request->udid,
                    'fbid' => $request->fbid,
                    'gid' => $request->gid,
                    'password' => bcrypt($request->password)
                ]);
                $user->save();

            }
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();


            return (new LoginUserResource(User::where('fbid', $request->fbid)->first()))
                ->additional(['meta' => [
                    'code' => '200',
                    'message' => 'Success',
                    'user' => 'old',
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer'
                ]]);


        } else {

            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'udid' => $request->udid,
                'fbid' => $request->fbid,
                'gid' => $request->gid,
                'password' => bcrypt($request->password)
            ]);
            $user->save();

            $id = (User::where('fbid', $request->fbid)->get())[0]->id;

            Auth::loginUsingId($id);

            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();


            return (new LoginUserResource(User::where('fbid', $request->fbid)->first()))
                ->additional(['meta' => [
                    'code' => '200',
                    'message' => 'Success',
                    'user' => 'old',
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer'
                ]]);

        }


    }
}
