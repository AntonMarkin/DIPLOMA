<?php

namespace App\Http\Controllers;


use App\Http\Requests\TechnicianRequest;
use App\Models\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class TechnicianController extends Controller
{
    public function index()
    {
        $requests = Request::orderBy('id', 'desc')->sortable()->paginate(15);
        return view('user_requests', compact('requests', 'statuses'));
    }

    public function start(Request $request)
    {
        $request->update(['status_id' => 2, 'technician_id' => Auth::id()]);
        return redirect()->route('users-requests');
    }
    public function success(Request $request)
    {
        $request->update(['status_id' => 3, 'technician_id' => Auth::id()]);
        return redirect()->route('users-requests');
    }
    public function reject(Request $request, TechnicianRequest $req)
    {
        $data = $req->validated();
        $request->update(['status_id' => 5, 'technician_id' => Auth::id(), 'comment' => $data['comment']]);
        return redirect()->route('users-requests');
    }
}
