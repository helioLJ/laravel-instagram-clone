<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileInfoUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileInfoController extends Controller
{
    /**
     * Update the user's profile information.
     */
    public function update(ProfileInfoUpdateRequest $request): RedirectResponse
    {
        $request->user()->profile->fill($request->validated());

        $request->user()->profile->save();

        return Redirect::route('profile.edit');
    }
}
