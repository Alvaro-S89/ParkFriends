<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'unique:users,username,' . auth()->user()->id . '|min:2|max:18|not_in:profile',
        ]);

        $user = User::find(auth()->user()->id);

        if ($request->image) {
            $image = $request->file('image');
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(1000, 1000);
            $imagepath = public_path('profiles') . '/' . $imageName;
            $imageServer->save($imagepath);
            $user->image = $imageName;
        }

        if ($request->has('username')) {
            $user->username = $request->username;
        }

        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
