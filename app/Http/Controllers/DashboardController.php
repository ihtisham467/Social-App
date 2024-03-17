<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        $sent_requests = auth()->user()->sent_requests;
        $received_requests = auth()->user()->received_requests;
        return view('dashboard', compact('users', 'sent_requests', 'received_requests'));
    }
}
