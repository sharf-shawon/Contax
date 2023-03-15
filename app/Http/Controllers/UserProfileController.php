<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = User::find($request->user()->id);
        $validated_data = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'phone' => 'required|numeric|starts_with:012,013,014,015,016,017,018,019|max_digits:11|unique:users,phone,' . Auth::user()->id,
            'name'          => 'required|string|max:50',
            'work_phone'    => 'nullable|numeric|max_digits:11',
            'home_phone'    => 'nullable|numeric|max_digits:11',
            'avatar'        => 'nullable|image|max:1024',
            'dob'           => 'nullable|date',
            'bio'           => 'nullable|string|max:500',
            'company'       => 'nullable|string|max:50',
            'title'         => 'nullable|string|max:50',
            'address'       => 'nullable|string|max:50',
            'city'          => 'nullable|string|max:50',
            'country'       => 'nullable|string|max:50',
            'postal_code'   => 'nullable|integer|min_digits:4|max_digits:5',
            'website'       => 'nullable|url|max:500',
            'facebook'      => 'nullable|url|max:500',
            'twitter'       => 'nullable|url|max:500',
            'instagram'     => 'nullable|url|max:500',
            'linkedin'      => 'nullable|url|max:500',
            'github'        => 'nullable|url|max:500',
            'youtube'       => 'nullable|url|max:500',
            'tiktok'        => 'nullable|url|max:500',
            'custom1_label' => 'nullable|string|max:20',
            'custom1_value' => 'nullable|string|max:20',
            'custom2_label' => 'nullable|string|max:26',
            'custom2_value' => 'nullable|string|max:20',
            'custom3_label' => 'nullable|string|max:26',
            'custom3_value' => 'nullable|string|max:20',
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->work_phone = $request->work_phone;
        $user->home_phone = $request->home_phone;
        $user->avatar = $request->avatar;
        $user->dob = $request->dob;
        $user->bio = $request->bio;
        $user->company = $request->company;
        $user->title = $request->title;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->postal_code = $request->postal_code;
        $user->website = $request->website;
        $user->facebook = $request->facebook;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->linkedin = $request->linkedin;
        $user->github = $request->github;
        $user->youtube = $request->youtube;
        $user->tiktok = $request->tiktok;
        $user->custom1_label = $request->custom1_label;
        $user->custom1_value = $request->custom1_value;
        $user->custom2_label = $request->custom2_label;
        $user->custom2_value = $request->custom2_value;
        $user->custom3_label = $request->custom3_label;
        $user->custom3_value = $request->custom3_value;

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
