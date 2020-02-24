<?php

namespace App\Http\Controllers\Api;

use App\User;

use App\Friend;
use App\Http\Controllers\Controller;
use App\Exceptions\UserNotFoundException;
use App\Http\Resources\Friend as FriendResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FriendRequestController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'friend_id' => 'required',
        ]);

        try {
            User::findOrFail($data['friend_id'])
                ->friends()->syncWithoutDetaching(auth()->user());
        } catch (ModelNotFoundException $e) {
            throw new UserNotFoundException();
        }

        return new FriendResource(
            Friend::where('user_id', auth()->user()->id)
                ->where('friend_id', $data['friend_id'])
                ->first()
        );
    }
}
