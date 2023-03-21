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

    /**
     * Validate a QR code
     * @param Request $request
     */

    public function validateQR(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|url|starts_with:http://contax.test,https://contax.test,http://localhost,https://localhost,http://test.linkard.io,https://test.linkard.io',
        ]);
        return response("ok");
    }
    /*
     * Register a card to a user
     */
    public function register(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'qr_code' => 'required|url|starts_with:http://contax.test,https://contax.test,http://localhost,https://localhost,http://test.linkard.io,https://test.linkard.io',
        ]);
        $cid = substr($request->qr_code, strrpos($request->qr_code, '/') + 1);
        if(Card::where('cid', $cid)->exists()) {
            return redirect()->back()->withErrors(['qr_code' => 'This Card is already registered']);
        }

        $card = new Card;
        $card->cid = $cid;
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
        $card->delete();
        return redirect()->back()->with('success', 'Card deleted successfully');
        //
    }
}
