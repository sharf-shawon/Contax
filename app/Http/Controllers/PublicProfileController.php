<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rogersxd\VCard\VCard;

class PublicProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($cid)
    {
        //ToDo: Get the user's profile from the database
        $user = User::where('id', 1)->first();
        return view('public.profile.index', [
            'user' => $user,
        ]);
    }

    /**
     * Download the user's profile as a vcf.
     */
    public function download($cid)
    {
        $user = User::where('id', 1)->first();
        $vcard = new VCard();

        $vcard->addPhoto(asset('img/avatar.png'));

        $vcard->addnames($user->name);

        $vcard->addPhone($user->phone, 'cell');
        $vcard->addPhone($user->work_phone, 'work');
        $vcard->addPhone($user->home_phone, 'home');

        $vcard->addJobtitle($user->title);
        $vcard->addCompany($user->company);

        $vcard->addEmail($user->email);


        $vcard->addUrl($user->website);

        $vcard->addUrl($user->github, 'github');

        $vcard->addNote($user->bio);

        $vcard->addBirthday($user->dob);

        $name = '';
        $extended = '';
        $street = $user->address;
        $city = $user->city;
        $region = '';
        $zip = $user->postal_code;
        $country = $user->country;
        $type = 'HOME';

        $vcard->addAddress(
            $name,
            $extended,
            $street,
            $city,
            $region,
            $zip,
            $country,
            $type
        );

        $socialProfile1 = $user->facebook;
        $typeSocialProfile1 = 'facebook';

        $socialProfile2 = $user->instagram;
        $typeSocialProfile2 = 'instagram';

        $socialProfile3 = $user->twitter;
        $typeSocialProfile3 = 'twitter';

        $socialProfile4 = $user->linkedin;
        $typeSocialProfile4 = 'linkedin';

        $socialProfile5 = $user->youtube;
        $typeSocialProfile5 = 'youtube';

        $socialProfile6 = $user->tiktok;
        $typeSocialProfile6 = 'tiktok';

        $vcard->addSocialProfile(
            $socialProfile1,
            $typeSocialProfile1
        );

        $vcard->addSocialProfile(
            $socialProfile2,
            $typeSocialProfile2
        );

        $vcard->addSocialProfile(
            $socialProfile3,
            $typeSocialProfile3
        );

        $vcard->addSocialProfile(
            $socialProfile4,
            $typeSocialProfile4
        );

        $vcard->addSocialProfile(
            $socialProfile5,
            $typeSocialProfile5
        );

        $vcard->addSocialProfile(
            $socialProfile6,
            $typeSocialProfile6
        );

        $vcard->addCustom('X-CUSTOM(CHARSET=UTF-8,ENCODING=QUOTED-PRINTABLE,Custom1)','1');

        // $vcard->setFilename($user->card->id);
        $vcard->setFilename($user->id);
        $vcard->setSavePath(storage_path('app/public/vcf/'));
        $vcard->save();
        return Storage::download('public/vcf/1.vcf', $user->name.'.vcf');

    }
}
