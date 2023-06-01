<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\Office;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::sortable()->paginate(10);
        $posts = Post::all();
        $offices = Office::all();
        $roles = [
            'client' => 'Клиент',
            'technician' => 'Технический специалист'
        ];
        return view('admin.users', compact('users', 'posts', 'offices', 'roles'));
    }

    public function updateOrCreate(UsersRequest $request, User $user = null)
    {
        $data = $request->validated();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        if ($user != null) {
            $user->update($data);
        } else {
            $user = User::create($data);
        }
        return redirect()->route('admin.users');
    }
}
