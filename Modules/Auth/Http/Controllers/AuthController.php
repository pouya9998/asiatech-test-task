<?php

namespace Modules\Auth\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Repositories\categoryInterface;
use Modules\Auth\Repositories\UserInterface;

class AuthController extends Controller{

    private $userRepository;
    public function __construct(UserInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login()
    {
        return view('auth::login');
    }

    public function loginAction(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // check If User Exist

        $userInstance = $this->userRepository->exists([
            ['column' => 'email','operator' => '=', 'value' => $request->input('email')]
        ]);

        if ($userInstance)
        {
            // checking Password
            $user = $this->userRepository->first([
                ['column' => 'email','operator' => '=', 'value' => $request->input('email')]
            ]);

            if (Hash::check($request->input('password'),$user->password)){
                \auth()->loginUsingId($user->id);
                return redirect(route('front.index'));
            }else{
                return back()->with('warning',__('word.wrong_auth'));
            }
        }else{
            return back()->with('warning',__('word.wrong_auth'));
        }
    }

    public function register()
    {
        return view('auth::register');
    }

    public function registerAction(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|confirmed'
        ]);

        $userInstance = $this->userRepository->exists([
            ['column' => 'email','operator' => '=', 'value' => $request->input('email')]
        ]);

        if (!$userInstance)
        {
            $user = $this->userRepository->create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'type' => 'user'
            ]);

            \auth()->loginUsingId($user->id);
            return redirect(route('front.index'));

        }else{
            return redirect(route('auth.login.index'))->with('warning',__('word.user_exist'));
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('front.index'));
    }
}
