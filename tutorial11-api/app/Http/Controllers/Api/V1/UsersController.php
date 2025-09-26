<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Http\Resources\V1\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;

class UsersController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if($this->include("tickets"))
        {
            $user_tick  = User::with("tickets")->paginate();
            $data       = UserResource::collection($user_tick);
            return $data;
        }

        $data = UserResource::collection(User::paginate());

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if($this->include("tickets"))
        {
            $user_tick  = $user->load("tickets");
            $data       = new UserResource($user_tick);
            return $data;
        }

        $data = new UserResource($user);

        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
