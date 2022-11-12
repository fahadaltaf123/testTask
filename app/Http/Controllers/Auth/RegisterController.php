<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UniqueUserNameRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;


class RegisterController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
        $this->middleware('guest');
        $this->middleware('user.log');
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(UniqueUserNameRequest $request)
    {
        
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $create_user = $this->userRepository->createUser($validated);
        if (isset($create_user)) {
            return redirect('/login')->with('successRegister', 'Registered Successfully! Now Please Login');
         }
         else{
            return back()->with('failure', 'Opps! Failed to Register, Please Try Again');
         } 
    }
}
