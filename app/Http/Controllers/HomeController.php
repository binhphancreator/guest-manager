<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('page.index', compact('groups'));
    }

    public function getProfile()
    {
        $user = Auth::user();
        // return $user;
        return view('page.profile', compact('user'));
    }

    public function updateProfile(ProfileStoreRequest $request)
    {
        $user = Auth::user();

        User::find($user->id)->update([
            'name' => $request->name,
            'token' => $request->token
        ]);

        if ($request->password && $request->password_new) {
            // return "333";
            $check = Hash::check($request->password, $user->password);
            if (!$check) return redirect()->route('profile.index')->with('error', "Mật khẩu không chính xác");
            User::find($user->id)->update([
                'password' => Hash::make($request->password_new)
            ]);
        }
        // return $user;
        return redirect()->route('profile.index')->with('success', "Cập nhật thành công");
    }
}
