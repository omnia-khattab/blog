<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    //
    function list(){
        $admins=User::get();
        return view('admins/admins',[
            'admins'=>$admins
        ]);
    }
    //add new admin
    function create(){
        return view('admins/createAdmin');
    }
    function save(Request $request){
        $validator=\Validator::make($request->all(),[
            'username'=>'required|max:50|min:3',
            'email'=>'required|email|max:50|min:10',
            'password'=>'required|regex:^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$^|min:6',
        ]);
        if($validator->fails()){
            return redirect('admin/create')
            ->withErrors($validator)
            ->withInput();
        }
        $admin=new User();
        $admin->username=$request->username;
        $admin->email=$request->email;
        $admin->password=\Hash::make($request->password);
        $admin->save();

        return redirect('admin');

    }
    //update
    function edit($id){
        $admin=User::find($id);
        return view('admins/edit',[
            'admin'=>$admin
        ]);
    }
    //update data in DB
    function update($id,Request $request){
        //validation
        $validator=\Validator::make($request->all(),[
            'username'=>'required|max:50|min:3',
            'email'=>'required|email|max:50|min:10',
        ]);
        if($validator->fails()){
            return redirect('admin/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        //extract data
        $_username=$request->username;
        $_email=$request->email;
        //$_content=$request->content;
        //select post with $id
        $admin=User::find($id);
        $admin->username=$_username;
        $admin->email=$_email;
        //$admin->content=$_content;
        
        $admin->save();
        return redirect('admin');
    }

    //delete
    function delete($id){
        $admin=User::find($id);

        $admin->delete();
        return redirect('admin');
    }

    //login
    function login(){
        return view('admins/login');
    }

    function handleLogin(Request $request){

        $credential=array('email'=>$request->email,'password'=>$request->password);

        if(Auth::attempt($credential))
        {
            return redirect('posts');
        }
        else
        {
            return view('admins/login');
        }
    }

    //logout
    function logout(){
        Auth::logout();
        return redirect('/login');
    }
    
}
