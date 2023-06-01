<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentsRequest;
use App\Http\Requests\OfficesRequest;
use App\Http\Requests\PostsRequest;
use App\Models\Department;
use App\Models\Office;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function departments(): View
    {
        $departments = Department::sortable()->paginate(10);
        return view('admin.departments', compact('departments'));
    }

    public function offices(): View
    {
        $offices = Office::sortable()->paginate(10);
        $departments = Department::all();
        return view('admin.offices', compact('offices', 'departments'));
    }

    public function posts(): View
    {
        $posts = Post::sortable()->paginate(10);
        return view('admin.posts', compact('posts'));
    }

    public function updateOrCreateDepartment(DepartmentsRequest $request, Department $department = null): RedirectResponse
    {
        $data = $request->validated();
        if ($department != null) {
            $department->update($data);
        } else {
            $department = Department::create($data);
        }
        return redirect()->route('admin.departments');
    }

    public function updateOrCreateOffice(OfficesRequest $request, Office $office = null): RedirectResponse
    {
        $data = $request->validated();
        if ($office != null) {
            $office->update($data);
        } else {
            $office = Office::create($data);
        }
        return redirect()->route('admin.offices');
    }

    public function updateOrCreatePost(PostsRequest $request, Post $post = null): RedirectResponse
    {
        $data = $request->validated();
        if ($post != null) {
            $post->update($data);
        } else {
            $post = Post::create($data);
        }
        return redirect()->route('admin.posts');
    }
}
