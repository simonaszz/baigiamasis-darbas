<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;



/**
 * Summary of AdminController
 */
class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } //End Method
    public function AdminLogin()
    {
        return view('admin.admin_login');

    }


    public function AdminDestroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } //End Method
}