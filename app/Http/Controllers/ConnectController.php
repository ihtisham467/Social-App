<?php

namespace App\Http\Controllers;

use App\Models\Connect;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function request($receiver_id) {
        Connect::create([
           'sender_id' => auth()->user()->id,
           'receiver_id' =>  $receiver_id,
        ]);

        return back()->with('success', 'Request has been sent successfully.');
    }

    public function accept($sender_id) {
        Connect::where('sender_id', $sender_id)->where('receiver_id', auth()->user()->id)->update([
            'status' => 1
        ]);

        return back()->with('success', 'Request has been accepted successfully.');
    }
}
