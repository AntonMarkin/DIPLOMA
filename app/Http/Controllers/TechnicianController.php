<?php

namespace App\Http\Controllers;


use App\Models\Request;
use App\Models\Status;

class TechnicianController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        $statuses = Status::all();
        return view('user_requests', compact('requests', 'statuses'));
    }

    public function changeStatus(\Illuminate\Http\Request $request)
    {
        $valid = $request->validate([
            'status_id' => '',
            'request_id' => ''
        ]);
        Request::changeStatus($valid['request_id'], $valid['status_id']);
        return redirect()->route('users-requests');
    }
}
