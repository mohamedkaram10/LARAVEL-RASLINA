<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Backend\ProfileUpdateRequest;

class AdminController extends Controller
{

public function dashboard() {
    return view('admin.index');
}
    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('admin.profile.view', compact('user'));
    }

    public function edit_profile($id)
    {
        $user = User::find($id);

        return view('admin.profile.edit', compact('user'));
    }

    public function update_profile(Request $request)
    {
    // dd($request->all());
        try {
            DB::beginTransaction();

            $id = Auth::user()->id;
            $user = User::find($id);
            // dd($user);
            $user->username = $request['username'];
            $user->name = $request['name'];
            $user->email = $request['email'];

            if ($request->hasFile('image')) {
                if (File::exists(public_path($user->image))) {
                    File::delete(public_path($user->image));
                }

                $image = $request['image'];
                $imageName = rand().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/admin/'), $imageName);
                $path = '/uploads/admin/'.$imageName;
                $user->image = $path;
            }
            $user->save();

            // Commit And Redirect on index with Success Message
            DB::commit();

            $toastr = [
                'message' => 'Admin Updated Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('admin.profile.view')->with($toastr);

        } catch (\Throwable $th) {

            // Rollback & Return Error Message
            DB::rollBack();
            echo $th->getMessage();
            return redirect()->back();

        }
    }

    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $hashPassword = Auth::user()->password;

        if (Auth::check($request->old_password, $hashPassword)) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();

            // $toastr = [
            //     'message' => 'Password Updated Successfully',
            //     'alert-type' => 'success',
            // ];

        session()->flash('message', 'Password Updated Successfully');
            return redirect()->route('admin.profile.view');
        } else {
            $toastr = [
                'message' => 'Password Updated Successfully',
                'alert-type' => 'error',
            ];

            return back()->with($toastr);
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $toastr = [
            'message' => 'User LogOut Successfully',
            'alert-type' => 'success',
        ];

        return redirect('/login')->with($toastr);
    }
}
