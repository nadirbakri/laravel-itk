<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function pageResetPassword()
    {
        return view('login.reset_password');
    }

    public function pageSuccessResetPassword()
    {
        return view('login.success_reset_password');
    }

    public function pageResendResetPassword()
    {
        return view('login.resend_reset_password');
    }
}
