<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PostsController extends Controller
{
    public function create()
    {
        return Inertia::render('Posts/CreatePost');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
