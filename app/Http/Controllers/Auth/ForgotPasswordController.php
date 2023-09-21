<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Modules\WorkflowEngine\Models\Staff;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('status', 'Email not found. Contact administrator for support.');
        }

        // Send reset link to users
        $this->sendEmailsToUsers($request->input('email'));

        // Send reset link to staff
       $this->sendEmailsToStaff($email);

        return redirect()->back()->with('status', 'Password reset link sent successfully. ');
    }

    protected function sendEmailsToUsers($email)
    {
        // Implement logic to send reset link to users
    
        // Send reset link to users
        Password::broker()->sendResetLink(['email' => $email]);
    }

    protected function sendEmailsToStaff($email)
    {
        // Implement logic to send reset link to staff
        // Fetch the user's user_id based on their email
        $user = User::where('email', $email)->first();
    
        if ($user) {
            $userId = $user->id;
    
            // Use $userId to fetch the alternative_email from the staff table
            $alternativeEmail = Staff::where('user_id', $userId)->value('alternative_email');
    
            $token = DB::table('password_resets')->where('email', $email)->value('token');
    
            if ($alternativeEmail) {
                // Build the reset password URL
                $token_url = (string)url("/password/reset/$token?email=$email");
    
                // Pass the $token argument to the ResetPassword constructor
               Mail::to($alternativeEmail)->send(new ResetPassword($token_url));

            }
        }
    }
    

}
