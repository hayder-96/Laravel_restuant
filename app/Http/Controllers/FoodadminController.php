<?php

namespace App\Http\Controllers;

use App\Models\foodadmin;
use Illuminate\Http\Request;
use App\Http\Resources\foodadmin as food;
use App\Http\Resources\userfood as us;
use App\Models\admin;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\userfood;
use App\Http\Resources\userresoures as ss;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;

class FoodadminController extends BaseController
{




    public function index()
    {

        $user=foodadmin::orderBy('created_at','DESC')->get();

        return $this->Respone(food::collection($user),200);
       
   
    }



    
    
    public function indexxx()
    {
        $user=User::all();


        return $this->Respone(ss::collection($user),200);
    }




    
    
    public function useryes()
    {
        $user=User::orderBy('created_at','DESC')->where('delivery','yes');


        return $this->Respone(ss::collection($user),200);
    }


    
    
    public function userno()
    {
        $user=User::orderBy('created_at','DESC')->where('delivery','no');;


        return $this->Respone(ss::collection($user),200);
    }




    
    public function getfooduser($id)
    {
        $user=userfood::all()->where('user_id',$id);

       return $this->Respone(us::collection($user),200);
    }


    






    
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
              
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        

        
      if($request->image!=null){
        
    
        $path= Cloudinary::upload($request->file('image')->getRealPath(),
        array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
        
      }


      if($request->image!=null){
        $input['image']=$path;
       }else{
           $input['image']='no';
       }


        $food=foodadmin::create($input);

        return $this->Respone($food,'Success input');
    }


    public function show($id)
    {
        $food=foodadmin::find($id);

        if($food==null){

            $this->sendError('Failed show');
        }
        
        return $this->Respone(new food($food),'Success Show');
    }

   
    public function updatefood(Request $request)
    {
        $uss=foodadmin::find($request->id);
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
           
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        

        if($request->image!=null){
        
    
            $path= Cloudinary::upload($request->file('image')->getRealPath(),
            array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
            
          }
       
        $uss->name=$input['name'];

        if($request->image!=null){

            $uss->image=$path;
        }
        $uss->save();

        return $this->Respone(new food($uss),'Success update');
    }

   
    public function destroy($id)
    {
        $food=foodadmin::find($id);
        
     $food->delete();
      return $this->Respone(new food($food),"done delete");
      }


      











      
    


    public function updateuser(Request $request,$id)
    {
        $uss=User::find($id);
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'delivery'=>'required',
           
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
       

        $uss->delivery=$input['delivery'];
        $uss->save();

        return $this->Respone(new ss($uss),'Success update');
    }

    }

