<?php

namespace App\Http\Controllers;

use App\Models\EquipmentType;
use App\Models\User;
use Illuminate\Http\Request;
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
        $requests = Auth::user()->requests;
        $i = 0;
        $equipmentTypes = EquipmentType::all();
        return view('home', compact('requests', 'equipmentTypes',  'i'));
    }
    public function profile(User $user)
    {
        return view('profile', compact('user'));
    }
}
