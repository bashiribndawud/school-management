<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TeacherProfileController extends Controller
{
    public function ProfileView() {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('teacher.profile.view', compact('user'));
    }

    public function ProfileEdit() {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('teacher.profile.edit', compact('editData'));
    }

    public function ProfileUpdate(Request $request, $id) {
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $user->name = $request->name;
        $user->address = $request->address;
        
        if($request->file('image')) {
            @unlink(public_path('upload/employee_image/'.$user->image));
            $file = $request->file('image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'), $fileName);
            $user->image = $fileName;
        }

        $user->save();

        $notification = array(
            "message" => "User Profile Successfully Updated",
            "alert_type" => "success"
        );

        return redirect()->route('teacher.profile')->with($notification);
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function PasswordView() {
        $user = User::find(Auth::user()->id);
        return view('teacher.profile.password_view', compact('user'));
    }

    public function PasswordUpdate(Request $request) {
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'password.confirmed' => 'Password does not match'
        ]
        );

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }
    }
}
