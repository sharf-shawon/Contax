<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
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
        ];
    }
}
