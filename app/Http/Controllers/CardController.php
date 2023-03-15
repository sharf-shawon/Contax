<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('card.index', [
            'cards' => Card::all(),
        ]);
    }

    /**
     * Show the form for registering a card to a user.
     */
    public function registerForm()
    {
        return view('card.register', [
            'users' => User::all(),
        ]);
    }

    /*
     * Register a card to a user
     */
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'cid' => 'required|unique:cards,cid',
        ]);

        $card = new Card;
        $card->cid = $request->cid;
        $card->user_id = $request->user_id;
        $card->save();

        return redirect()->route('card.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
