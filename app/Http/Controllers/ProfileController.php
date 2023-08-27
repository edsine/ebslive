<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        //echo "I am on the profile page";
        return view('users/profile', compact('user'));
    }
    
    public function showProfile()
    {
        return view('users.show_profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|same:password_confirmation'
        ]);
        if($request->filled('password')){
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
        }else {
            $request->request->remove('password');
        }
        $input = $request->all();
        $item = User::findorFail($id);
        $item->update($input);
        Flash::success('Employer saved successfully.');
        return redirect()->route('home');
    }
}
