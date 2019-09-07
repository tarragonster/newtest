<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Laravel\Socialite\Facades\Socialite;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\DB;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userAccount','userLogout','updateAccount');

    }

    public function userLogout(){

        Auth::guard('web')->logout();

        return redirect('/login');
    }

    public function userAccount($id){
        $authUser = User::where('id', $id)->first();

        return view('admin/main_layout')->with('authUser', $authUser);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('auth/google');
        }

        $authUser = $this->insertUser($user);

        Auth::login($authUser,true);

        return redirect(url('/account/'.$authUser->id));
    }

    public function insertUser($user){

        $authUser = User::where('google_id', $user->id)->first();
        if($authUser){
            return $authUser;
        }else{
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id
            ]);
        }

    }

    public function updateAccount(Request $request){

        $id = $request->input('id');

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect(url('/account/'.$id));
    }

}
