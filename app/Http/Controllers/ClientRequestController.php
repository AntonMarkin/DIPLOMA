<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequestRequest;
use App\Models\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ClientRequestController extends Controller
{
    public function updateOrCreate(ClientRequestRequest $request, $id = 0): RedirectResponse
    {
        $data = $request->safe()->except('equipment');
        $data['user_id'] = Auth::id();
        $equipment = $request->safe()->only('equipment');
        $request = Request::updateOrCreate(['id' => $id], $data);
        $request->equipment()->attach($equipment['equipment']);
        return redirect()->route('home');
    }
    public function delete(Request $request)
    {
        if (Auth::user()->role == 'client' || url()->previous() == route('home').'/'){
            $request->update(['status_id' => 4]);
            return redirect()->route('home');
        } else {
            $request->equipment()->detach();
            $request->delete();
            return redirect()->route('users-requests');
        }
    }
}
