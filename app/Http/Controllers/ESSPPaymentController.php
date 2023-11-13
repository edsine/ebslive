<?php

namespace App\Http\Controllers;


use view;

use Response;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Modules\EmployerManager\Models\Payment;




class ESSPPaymentController extends AppBaseController
{

    public function index()
    {
        
          $payments = Payment::paginate(10);
        return view('payments', compact('payments'));
    }

    public function approvePayment($id)
    {
        // Find the payment by ID
        $payment = Payment::findOrFail($id);

        // Update the payment status or perform any other necessary actions
        $payment->update(['approval_status' => 1]); // Assuming '1' represents the approved status

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment approved successfully');
    }
}