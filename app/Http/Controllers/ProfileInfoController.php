<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileInfoUpdateRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProfileInfoController extends Controller
{
    /**
     * Update the user's profile information.
     */
    public function update(ProfileInfoUpdateRequest $request): RedirectResponse
    {
        $request->user()->profile->fill($request->validated());
        dd($request->validated());

        $request->user()->profile->save();

        return Redirect::route('profile.edit');
    }

    public function store()
    {
        request()->validate([
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();
        
        auth()->user()->profile()->update([
            'image' => $imagePath,
        ]);

        return Redirect::route('profile.edit');
    }
}
