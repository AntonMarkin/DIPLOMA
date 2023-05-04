<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequestRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class ClientRequestController extends Controller
{
    public function updateOrCreate(ClientRequestRequest $request, $id = 0)
    {
        $data = $request->safe()->except('equipment');
        $data['user_id'] = Auth::id();
        $equipment = $request->safe()->only('equipment');
        $request = Request::updateOrCreate(['id' => $id], $data);
        $request->equipment()->attach($equipment['equipment']);
        return redirect()->route('home');
    }
}
