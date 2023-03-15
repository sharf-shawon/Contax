<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone Number')" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />

            {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif --}}
        </div>

        <div>
            <x-input-label for="work_phone" :value="__('Work Phone Number')" />
            <x-text-input id="work_phone" name="work_phone" type="text" :value="old('work_phone', $user->work_phone)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('work_phone')" />
        </div>

        <div>
            <x-input-label for="home_phone" :value="__('Home Phone Number')" />
            <x-text-input id="home_phone" name="home_phone" type="text" :value="old('home_phone', $user->home_phone)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('home_phone')" />
        </div>

        <div>
            <x-input-label for="company" :value="__('Company')" />
            <x-text-input id="company" name="company" type="text" :value="old('company', $user->company)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('company')" />
        </div>

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" :value="old('title', $user->title)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="dob" :value="__('Date of Birth')" />
            <x-text-input id="dob" name="dob" type="date" :value="old('dob', $user->dob)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('dob')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" :value="old('address', $user->address)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" :value="old('city', $user->city)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" :value="old('country', $user->country)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>

        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" name="postal_code" type="text" :value="old('postal_code', $user->postal_code)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>

        <div>
            <x-input-label for="website" :value="__('Personal Website')" />
            <x-text-input id="website" name="website" type="url" :value="old('website', $user->website)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('website')" />
        </div>

        <div>
            <x-input-label for="facebook" :value="__('Facebook URL')" />
            <x-text-input id="facebook" name="facebook" type="url" :value="old('facebook', $user->facebook)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>

        <div>
            <x-input-label for="instagram" :value="__('Instagram URL')" />
            <x-text-input id="instagram" name="instagram" type="url" :value="old('instagram', $user->instagram)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>

        <div>
            <x-input-label for="linkedin" :value="__('LinkedIn URL')" />
            <x-text-input id="linkedin" name="linkedin" type="url" :value="old('linkedin', $user->linkedin)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin')" />
        </div>

        <div>
            <x-input-label for="github" :value="__('GitHub URL')" />
            <x-text-input id="github" name="github" type="url" :value="old('github', $user->github)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('github')" />
        </div>

        <div>
            <x-input-label for="youtube" :value="__('YouTube URL')" />
            <x-text-input id="youtube" name="youtube" type="url" :value="old('youtube', $user->youtube)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('youtube')" />
        </div>

        <div>
            <x-input-label for="twitter" :value="__('Twitter URL')" />
            <x-text-input id="twitter" name="twitter" type="url" :value="old('twitter', $user->twitter)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
        </div>

        <div>
            <x-input-label for="tiktok" :value="__('TikTok URL')" />
            <x-text-input id="tiktok" name="tiktok" type="url" :value="old('tiktok', $user->tiktok)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('tiktok')" />
        </div>

        <div>
            <x-input-label for="custom1_label" :value="__('Custom Label 1')" />
            <x-text-input id="custom1_label" name="custom1_label" type="text" maxlength="50" :value="old('custom1_label', $user->custom1_label)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('custom1_label')" />
            <br>
            <x-input-label for="custom1_value" :value="__('Custom Value 1')" />
            <x-text-input id="custom1_value" name="custom1_value" type="text" maxlength="50" :value="old('custom1_value', $user->custom1_value)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('custom1_value')" />
        </div>

        <div>
            <x-input-label for="custom2_label" :value="__('Custom Label 2')" />
            <x-text-input id="custom2_label" name="custom2_label" type="text" maxlength="50" :value="old('custom2_label', $user->custom2_label)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('custom2_label')" />
            <br>
            <x-input-label for="custom2_value" :value="__('Custom Value 2')" />
            <x-text-input id="custom2_value" name="custom2_value" type="text" maxlength="50" :value="old('custom2_value', $user->custom2_value)" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('custom2_value')" />
        </div>
    {{--
        avatar
        bio
    --}}
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
