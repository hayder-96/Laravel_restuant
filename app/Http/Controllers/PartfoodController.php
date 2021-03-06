<?php

namespace App\Http\Controllers;

use App\Models\partfood;
use Illuminate\Http\Request;
use App\Http\Resources\partfood as food;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
class PartfoodController extends BaseController
{
   
    public function indexx($id)
    {
        $user=partfood::all()->where('food_id',$id);

       return $this->Respone(food::collection($user),200);
    }

    
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
            'price'=>'required',
            'food_id'=>'required'
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
       
        

        $food=partfood::create($input);

        return $this->Respone($food,'Success input');
    }


    public function show($id)
    {
        $food=partfood::find($id);

        if($food==null){

            $this->sendError('Failed show');
        }
        
        return $this->Respone(new food($food),'Success Show');
    }

   
    public function updatefood(Request $request)
    {
        $uss=partfood::find($request->id);
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
             'price'=>'required'
           
        ]);

        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }

        
       
        if($request->image!=null){
        
    
            $path= Cloudinary::upload($request->file('image')->getRealPath(),
            array("public_id" =>$request->name,"quality"=>'auto'))->getSecurePath();
            
          }
       
       

        if($request->image!=null){

            $uss->image=$path;
        }

        $uss->name=$input['name'];
        $uss->price=$input['price'];
        $uss->save();

        return $this->Respone(new food($uss),'Success update');
    }

   
    public function destroy($id)
    {
        $food=partfood::find($id);
        
     $food->forceDelete();
      return $this->Respone(new food($food),"done delete");
      }


      
   
    }
