<?php

namespace App\Http\Controllers;

use App\Models\upimage;
use Illuminate\Http\Request;
use App\Http\Resources\upimage as up;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class UpimageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexx(Request $request)
    {
        $user=upimage::where('food_id',$request->food_id)->where('name',$request->name);

        return $this->Respone(new up($user),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();

        $valdit=Validator::make($request->all(),[

            'name'=>'required',
            'image'=>'required',
            'food_id'=>'required',
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
      


        $food=upimage::create($input);

        return $this->Respone($food,'Success input');
    }

    
    public function show(upimage $upimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\upimage  $upimage
     * @return \Illuminate\Http\Response
     */
    public function edit(upimage $upimage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\upimage  $upimage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, upimage $upimage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\upimage  $upimage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food=upimage::find($id);
        
        $food->delete();
         return $this->Respone($food,"done delete");
    }
}
