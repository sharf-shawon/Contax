<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
