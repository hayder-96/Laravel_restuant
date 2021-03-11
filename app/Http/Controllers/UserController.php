<?php

namespace App\Http\Controllers;

use App\Models\admin;

use App\Models\partfood;
use Illuminate\Http\Request;
use App\Http\Resources\partfood as foodd;
use Illuminate\Support\Facades\Validator;
use App\Models\foodadmin;
use App\Models\User;
use App\Models\userfood;
use App\Http\Resources\foodadmin as food;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\userresoures as ss;
use App\Models\usersecond;
use App\Models\opcl;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class UserController extends BaseController
{
    

    public function Register(Request $request){
        
    
        
        $validit=Validator::make($request->all(),[
    
            'name'=>'required',
            'longtude'=>'required',
            'latitude'=>'required'
         
    
        ]);
        if($validit->fails()){
    
            return $this->sendError('failed register!',$validit->errors());
        }
    
        $input=$request->all();
    

       
        $user=User::create($input);

       //$user=$request->name;
         $success=$user->createToken(';ejhih/><{+876yk')->accessToken;
          
    
        return $this->Respone(200,$success);
    
        
    }





    








   
    

    public function getallfood()
    {
        $user=foodadmin::all();

        // $o=opcl::where('open','true')->get();

        // if($o->open=='true'){

       return $this->Respone(food::collection($user),200);
        // }else{
        //     return $this->Respone('null','false');
        // }
    }





   
    public function getpartfood($id)
    {
        $user=partfood::all()->where('food_id',$id);

        $o=opcl::where('open','true')->get();

        if($o->open=='true'){

            return $this->Respone(foodd::collection($user),200);
        }else{
            return $this->Respone('null','false');
        }
      
    }









    public function store(Request $request)
    {
        

        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
            'price'=>'required',
            'number'=>'required',
           

              
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }


        
    


        $input['user_id']=Auth::id();
        

        $food=userfood::create($input);

        return $this->Respone($food,'Success input');
    }




    
    public function show($id)
    {
        $food=partfood::find($id);

        if($food==null){

            $this->sendError('Failed show');
        }
        
        return $this->Respone(new foodd($food),'Success Show');
    }

   
}
