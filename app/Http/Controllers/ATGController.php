<?php

namespace App\Http\Controllers;
use App\project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ATGController extends Controller
{
    public function index(){
    	return view('/form');
    }

    public function store(Request $request)
    {

                    // $validatedData =request()->validate([]);
                	$validatedData = $request->validate
                	([
            			    'name' => 'required',
                             'email' => 'required|email:rfc,dns|unique:projects,email,NULL,NULL,pin,' . $request['pin'],
                            'pin' => 'required|min:6|max:6|unique:projects,pin,NULL,NULL,email,' . $request['email'],
            			    // 'email' => ['required','unique:projects','email:rfc,dns'],
            			    // 'pin'=>['required','min:6','max:6'],
            			]);

                   // $mydata=project::get($request['email']);

                // $data->email=request('email');
                    $data= new project();
                    $data->name=$request['name'];
                    $data->email=$request['email'];
                    $data->pin=$request['pin'];
                    $data->save();


                    // mail 
                // Mail::raw('It works!',function($message){
                //     $message->to(request('email'))
                //             ->subject('Hello I am Tanya!');
                // });

                
                // projects::create([
                //     'name'=>request('name'),
                //     'email'=>request('email'),
                //     'pin'=>request('pin')

                // ]);// write : protected $fillable =['name','email','pin']; in model 

                //project::create($validatedData);
                //projects::update();
                 return view('/form',['success'=>'1']);
                            // ->with('message','Email sent ! ');
    }

    
}























/*
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"



!! LOcalhost Details!!
DB_CONNECTION=mysql
DB_HOST=remotemysql.com:3306
DB_PORT=3306
DB_DATABASE=BIEHw833Ql
DB_USERNAME=BIEHw833Ql
DB_PASSWORD=KUVW7IFAJ7*/

