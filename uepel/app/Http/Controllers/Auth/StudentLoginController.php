<?php


namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentLoginController extends Controller
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
    //protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.student_login');
    }

    public function login(Request $request)
    {
        Session::flush();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $rememberMe = false;
        if( isset($request->remember) ) {
            $rememberMe = true;
        }

        if( Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $rememberMe))
        {
            return redirect()->intended(route('student.home'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect()->intended(route('login'));
    }
}
