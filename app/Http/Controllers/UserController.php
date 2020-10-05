<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection as UserCollectionResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new UserCollectionResource(User::with('wallets')->get());
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $data['name']     = $request->input('name');
        $data['email']    = $request->input('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['super']    = $request->input('super');

        User::create($data);
    }
}
