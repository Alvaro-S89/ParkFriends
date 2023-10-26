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

        $request->request->add(['username' => Str::slug($request->username) ]);

        $this->validate($request, [
            'username' => 'required|unique:users|min:2|max:18|not_in:profile',
        ]);

        if($request->image){
            $image = $request->file('image');

            $imageName = Str::uuid() . "." . $image->extension();

            $imageServer = Image::make($image);
            $imageServer->fit(1000, 1000);
            $imagepath = public_path('profiles') . '/' . $imageName;

            $imageServer->save($imagepath);
        }

        $user = User::find(auth()->user()->id);

        $user->username = $request->username;
        $user->image = $imageName ?? auth()->user()->image ?? null;

        $user->save();

        return redirect()->route('posts.index', $user->username);
    }
}
