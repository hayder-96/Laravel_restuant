<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
class AdminController extends BaseController
{
    

    public function Register(Request $request){
        
    
        
        $validit=Validator::make($request->all(),[
    
            'name'=>'required',
              'password'=>'required'
         
    
        ]);
        if($validit->fails()){
    
            return $this->sendError('failed register!',$validit->errors());
        }
    
        $input=$request->all();
    
    
        
    
       // $input['password']= Crypt::encrypt( $input['password']);
       
       $input['password']= Hash::Make( $input['password']);
        $user=admin::create($input);
         $success['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;
         $success['name']=$user->name;
          
    
        return $this->Respone($success,'تم التسجيل ');
    
        
    }
    public function Login(Request $request){

      
        $validit=Validator::make($request->all(),[
    
            'name'=>'required',
            'password'=>'required',
    
        ]);
       
           $user=admin::where('name',$request->name)->first();
           $users=crypt::decrypt($user->password);
           if($users===$request->password && $user->name==$request->name){
           // if( Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])){
           //     $user=Auth::user();
            $success['token']=$user->createToken(';ejhih/><{+876yk')->accessToken;
    
                return $this->Respone($success,"تم الدخول");
    
    
         } else{
             return $this->Respone(500,"البريد  او الرمز غير متطابق");
        }  
    
    
    
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
