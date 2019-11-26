<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        $comment_count = $user->comments->where('user_id', $user->id)->count();

        return view('profile.index', [
            'user' => $user,
            'created_on' => $user->created_at->format("F Y"),
            'comment_count' => $comment_count
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        // First layer of protection: use the policy to check if
        // the current user can be here.
        $this->authorize('update', $user);

        $data = request()->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'bio' => '',
            'profile_picture' => ''
        ]);

        // Only store the picture if it's new and in the request
        if (request('profile_picture')) {
            // TODO: maybe use Intervention\Image to resize it
            $image_path = request("profile_picture")->store('/profile', 'public');
            $image_array = ['profile_picture' => $image_path];
        }

        // Second layer of production:
        // Grab the user data off of auth before updating it
        // with the updated data so we're using
        // the currently authorized users' data.
        auth()->user()->update(array_merge(
            $data,
            $image_array ?? []
        ));

        return redirect('/profile/' . $user->username);
    }
}
