<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;


class ProfileController extends Controller
{
    /**
     * Show the profile for a given user.
     */

    public function show($user, Request $request): Response
    {
        $userFound = User::with('profile', 'posts')->findOrFail($user);
        $follows = false;
        $posts = Cache::remember(
            'count.posts.' . $userFound->id,
            now()->addSecond(30),
            function () use ($userFound) {
                return $userFound->posts->count();
            }
        );
        $followers = Cache::remember(
            'count.follower.' . $userFound->id,
            now()->addSecond(30),
            function () use ($userFound) {
                return $userFound->profile->followers->count();
            }
        );
        $following = Cache::remember(
            'count.following.' . $userFound->id,
            now()->addSecond(30),
            function () use ($userFound) {
                return $userFound->following->count();
            }
        );
        
        $allUsers = User::with('profile')->get();

        if (auth()->user()) {
            $follows = [];
            foreach ($allUsers as $user) {
                $follows[$user->id] = auth()->user()->following->contains($user->id);
            }
        }

        return Inertia::render('Profile', [
            'user' =>  $userFound,
            'users' =>  $allUsers,
            'follows' =>  $follows,
            'followers' =>  $followers,
            'following' =>  $following,
            'posts' =>  $posts,
            'status' => session('status'),
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        $this->authorize('update', $request->user()->profile);
        $user = User::with('profile')->findOrFail($request->user()->id);
        return Inertia::render('Profile/Edit', [
            'user' =>  $user,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
