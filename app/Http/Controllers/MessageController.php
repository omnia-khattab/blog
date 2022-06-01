<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
class MessageController extends Controller
{
    //See All messages
    function list(){
        $messages=Message::get();
        return view('messages/messages',[
            'messages'=> $messages
        ]);
    }

    //Send Message
    function create(){
        return view('messages/create');
    }
    function send(Request $request){
        $validator=\Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:50|min:10',
            'phone'=>'required|max:20|min:11',
            'message'=>'required|max:300|min:10',
        ]);
        if($validator->fails()){
            return redirect('messages/create')
            ->withErrors($validator)
            ->withInput();
        }
        $message=new Message();
        $message->name=$request->name;
        $message->email=$request->email;
        $message->phone=$request->phone;
        $message->message=$request->message;

        $message->save();

        return redirect('messages');

    }

    //delete Message
    function delete($id){
        $message=Message::find($id);

        $message->delete();
        return redirect('messages');
    }
}
