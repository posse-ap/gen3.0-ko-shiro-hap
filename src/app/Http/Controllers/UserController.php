<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the users list.
     */
    public function index(Request $request): Response
    {
        return Inertia::render('UsersList', [
            'users' => User::all(),
        ]);
    }
}
