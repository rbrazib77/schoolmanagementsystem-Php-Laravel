<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Carbon\Carbon;

class UserController extends Controller
{
    public function UserView(){
        // $allUser=User::all();
        $data['allUser']=User::where('usertype','Admin')->get();
        return view('backend.user.view_user',$data);
    }
    public function UserAdd(){
        return view('backend.user.add_user');
    }
    public function UserStore(Request $request){
         $validateData=$request->validate([
            'email'=>'required|unique:users',
            'name'=>'required',
         ]);

         $code=rand('0000','9999');

         User::insert([
            'usertype'=>"Admin",
            'name'=>$request->name,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($code),
            'code'=>$code,
            'created_at'=>Carbon::now(),
         ]);
         $notification=array('messege'=>'User Add Success!','alert-type'=>'info');
         return back()->with($notification);
    }

    public function UserEdit($id){
        $editData=User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }
     public function UserUpdate(Request $request,$id){
        User::find($id)->update([
            'role'=>$request->role,
            'name'=>$request->name,
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
         ]);
         $notification=array('messege'=>'User Update Success!','alert-type'=>'success');
         return Redirect()->route('user.view')->with($notification);
    }

    public function UserDelete($id){
        User::find($id)->delete();
        $notification=array('messege'=>'User Delete Success!','alert-type'=>'error');
        return Redirect()->route('user.view')->with($notification);

    }
}
