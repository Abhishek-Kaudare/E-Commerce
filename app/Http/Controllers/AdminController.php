<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin'=>'1'])){
                /// ---Using Default laravel Authentication for Our Template
                // echo "Success"; die;
                // Session::put('adminSession',$data['email']);
                return redirect::action('AdminController@dashboard');
            }else{
                // echo "Failed"; die;
                return redirect('/admin')->with('flash_message_error','Invalid Username and Password');
            }
        }
        if(Auth::check()){
            return redirect()->back()->with('flash_message_error1','Already Login');
        }
        return view('admin.admin_login');


    }

    public function dashboard(){
        // if(Session::has('adminSession')){
        //     return view('admin.dashboard');
        // }else{
        //     return redirect('/admin')->with('flash_message_error','Please Login To Access');
        // }
        return view('admin.dashboard');
    }


    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successfully');

    }

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $user = Auth::user()->email;
        $check_password = User::where(['email'=> $user ])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $user = Auth::user()->email;
            $check_password = User::where(['email' => $user])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('email', $user)->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success','Password updated Successfully!');
            }else {
                return redirect('/admin/settings')->with('flash_message_error','Incorrect Current Password!');
            }
        }
    }

}
