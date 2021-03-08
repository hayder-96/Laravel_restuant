<?php

namespace App\Http\Controllers;

use App\Models\usernoty;
use Illuminate\Http\Request;
use App\Http\Resources\resnoty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UsernotyController extends BaseController
{
   
    public function index()
    {
        
        $user=usernoty::where('user_id',Auth::id());

        return $this->Respone(resnoty::collection($user),200);


    }

  
   
    
    public function store(Request $request)
    {
        
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'noty'=>'required',
             'user_id'=>'required'
        ]);
        if($valdit->fails()){

            return $this->sendError('Failed input',$valdit->errors());
        }


        $food=usernoty::create($input);

        return $this->Respone($food,'Success input');
    }



    

   
    public function destroy($id)
    {
        $food=usernoty::find($id);
          
        $food->delete();
         return $this->Respone($food,"done delete");
    }
}
