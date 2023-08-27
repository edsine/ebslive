<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Modules\WorkflowEngine\Models\Staff;
use Modules\Shared\Models\Branch;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Assuming the User model has a 'department_id' attribute
    $userId = Auth::id();

    $staff = Staff::where('user_id', $userId)->first();

    if ($staff) {
        // Store department_id in the session
        Session::put('department_id', $staff->department_id);
        Session::put('branch_id', $staff->branch_id);
    }

    // Redirect to the intended page or any desired route
    return redirect()->intended('/home');
    }
}
