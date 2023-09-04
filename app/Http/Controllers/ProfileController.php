<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flash;
use Modules\Shared\Models\Branch;
use Modules\Shared\Models\Department;

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
       
       $id= auth()->id();
       $data= \DB::table('users')
       ->join('staff','users.id','=','staff.user_id')
       ->join('model_has_roles','users.id','=','model_has_roles.model_id')
       ->join('roles','model_has_roles.role_id','=','roles.id')
       ->join('departments', 'staff.department_id', '=', 'departments.id')
       ->join('branches', 'staff.branch_id', '=', 'branches.id')
       ->where('users.id','=',$id) 
       ->get();

       //
    //   $thedepartmentid= auth()->user()->staff->department_id;
    //   dd($thedepartmentid);

//   $depa= Department::where('id',$thedepartmentid)->get();
// //   dd($depa);
//  $aa= \DB::table('departments')
//   ->select('name');
//   dd($aa);
  


     
      

        $role=Auth::user()->roles->pluck('name');
       
        return view('users.show_profile',compact('role','data'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
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
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            if ($file->isValid()) {
                $fileName = $file->hashName();
                $path = $file->store('public');
                $input['profile_picture'] = $fileName;
            } else {
                Flash::success(' Image Rejected, Please Recheck it and Reupload.');
                return redirect()->route('home');
            }
        }
        
        $input = $request->all();
        $item = User::findorFail($id);
        $item->staff->update(['profile_picture' => $input['profile_picture']]);
        $item->update($input);
        Flash::success(' saved successfully.');
        return redirect()->route('home');
    }
}
