<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function UserDashboard() {
    $id = Auth::user()->id;
    $userData= User::find($id);
    return view('index',compact('userData'));
  }




}
