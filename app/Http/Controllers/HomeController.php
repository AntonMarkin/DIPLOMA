<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = Request::where('user_id', Auth::id())->orderBy('id', 'desc')->sortable()->paginate(15);
        $i = 0;
        $equipmentTypes = EquipmentType::all();
        return view('home', compact('requests', 'equipmentTypes',  'i'));
    }
    public function profile(User $user)
    {
        if ($user->role != 'client'){
            $requests = Request::where('technician_id', $user->id)->orderBy('id', 'desc')->sortable()->paginate(6);
        }
        return view('profile', compact('user', 'requests'));
    }
}
