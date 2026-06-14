<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(): Response
    {
        $users = User::latest()->get(['id', 'name', 'email', 'created_at']);

        return Inertia::render('Admin/Users/Index', ['users' => $users]);
    }
}
