<?php

namespace App\Http\Controllers;

use App\Models\opcl;
use Illuminate\Http\Request;
use App\Http\Resources\opclo;
use Illuminate\Support\Facades\Validator;
class OpclController extends BaseController
{
    
    public function indexx()
    {
        
        $user=opcl::all();

        return $this->Respone(opclo::collection($user),200);
    }

   
    public function store(Request $request)
    {
        $input=$request->all();

    
        $food=opcl::create($input);

        return $this->Respone($food,'Success input');
    }

    
    public function update(Request $request,$id)
    {
        $uss=opcl::find($id);
        $input=$request->all();

       

          if($request->open !=null){
        $uss->open=$input['open'];
          }
          if($request->close !=null){
        $uss->close=$input['close'];
          }
        $uss->save();

        return $this->Respone($uss,'Success update');
    }

    
    public function destroy(opcl $opcl)
    {
        
    }
}
