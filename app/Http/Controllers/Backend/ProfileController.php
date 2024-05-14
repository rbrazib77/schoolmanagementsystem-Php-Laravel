<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use Carbon\Carbon;
class ProfileController extends Controller
{
    public function ProfileView(){
        $id=Auth::user()->id;
        $user=User::find($id);
        return view('backend.user.view_profile',compact('user'));
    }
     public function ProfileEdit(){
        $id=Auth::user()->id;
        $editData=User::find($id);
        return view('backend.user.edit_profile',compact('editData'));
    }
     public function ProfileStore(Request $request){
        $data=User::find(Auth::user()->id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobile=$request->mobile;
        $data->address=$request->address;
        $data->gender=$request->gender;

        if($request->file('image')){
            $file=$request->file('image');
           @unlink(public_path('upload/user_images/'.$data->image));
           $filename=date('YmdHi').$file->getClientOriginalExtension();
           $file->move(public_path('upload/user_images'), $filename);
           $data['image']= $filename;
        }
        $data->save();
        $notification=array('messege'=>'Profile Update Success!','alert-type'=>'success');
         return Redirect()->route('profile.view')->with($notification);
    }

    public function passwordView (){
        return view('backend.user.edit_password');
    }
     public function PasswordChange (Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=>bcrypt($request->password)
            ]);
            $notification=array('messege'=>'Password Update Success!','alert-type'=>'info');
            return back()->with($notification);
        }else{
            return back()->with("curruntPassword_error","Your Priovet Your Current Password dose not Matched");
        }

    }
}
