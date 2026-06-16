<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::latest()->get(['id', 'name', 'email', 'created_at']);

        return Inertia::render('Admin/Users/Index', ['users' => $users]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create($validated);

        return back()->with('message', 'کاربر با موفقیت ایجاد شد.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return back()->with('message', 'کاربر حذف شد.');
    }

    public function edit(User $user): Response
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8', // پسورد اختیاری در ویرایش
        ]);

        if ($request->filled('password')) {
            $user->update($validated);
        } else {
            $user->update(collect($validated)->except('password')->toArray());
        }

        return redirect()->route('admin.users.index')->with('message', 'کاربر بروزرسانی شد.');
    }
}
