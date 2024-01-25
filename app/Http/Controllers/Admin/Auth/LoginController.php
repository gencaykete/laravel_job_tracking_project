<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('admin.home');
        $this->middleware('guest:admin')->except('giris', 'logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function guard()
    {
        return \Auth::guard('admin');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

/*        $user = \Auth::user();
        $user->last_login_date = now();
        $user->save();*/

        //activity()->log($user->name . ' ' . $user->surname . ' yöneticisi giriş yaptı');

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function logout(Request $request)
    {
        $name = $this->guard()->user()->name . ' ' . $this->guard()->user()->surname;
        //activity()->log($name . ' yöneticisi çıkış yaptı');

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'status' => 'error',
            'message' => "Girilen bilgiler hatalı."
        ]);
    }

}
