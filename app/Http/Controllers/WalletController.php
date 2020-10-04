<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Resources\Wallet as WalletResource;
use App\Http\Resources\WalletCollection as WalletCollectionResource;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new WalletCollectionResource($request->user()->wallets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'currency' => ['required', 'string', 'min:3', 'max:3'],
            'status' => 'in:ACTIVE,INACTIVE'
        ]);
        //to add validation
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $wallet = Wallet::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        return new WalletResource($wallet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        $wallet->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        $wallet->delete();
    }
}
