<?php

namespace Modules\User\Http\Controllers;

use Modules\Core\Http\Controllers\CPanel\AdminController;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\StoreUserRequest;

class UserController extends AdminController
{
    public function index()
    {
        return view('user::index');
    }

    public function create()
    {
        return view('user::create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'profession' => $request->profession,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city' => $request->city,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'joined_at' => $request->joined_at,
        ]);

        if ($request->avatar) {
            $user
                ->addFromMediaLibraryRequest($request->avatar)
                ->toMediaCollection('avatar');
        }

        session()->flash('status', __('The user has been successfully added'));

        return redirect()->route('cp.users');
    }

    public function edit()
    {
        return view('user::edit');
    }

    public function show()
    {
        return view('user::show');
    }
}
