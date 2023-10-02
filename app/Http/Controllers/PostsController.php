<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Intervention\Image\Facades\Image;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    public function index()
    {
        $allUsers = [];
        $follows = [];
        if(auth()->user()) {
            $users = auth()->user()->following()->pluck('profiles.user_id');
            $posts = Post::whereIn('user_id', $users)
            ->orWhere('user_id', auth()->user()->id) // Include posts from the current user
            ->with('user.profile')
            ->latest()
            ->paginate(5);
            $allUsers = User::with('profile')->get();
        
            // Loop through each user and check if the logged-in user follows them
            foreach ($allUsers as $user) {
                $follows[$user->id] = auth()->user()->following->contains($user->id);
            }
        } else {
            $posts = Post::latest()->with('user.profile')->paginate(5);
            $allUsers = User::with('profile')->get();
        }

        return Inertia::render('Home', [
            'user' => auth()->user(),
            'users' => $allUsers,
            'posts' => $posts,
            'follows' => $follows,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    public function create(Request $request)
    {
        $user = User::with('profile')->findOrFail($request->user()->id);
        return Inertia::render('Posts/CreatePost', [
            'user' => $user,
        ]);
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();
        
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        $user = User::with('profile')->findOrFail($post->user_id);
        return Inertia::render('Posts/ShowPost', [
            'user' => $user,
            'post' =>  $post,
        ]);
    }
}
