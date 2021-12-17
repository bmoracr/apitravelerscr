<?php

namespace App\Http\Controllers\Api\Tours;

use App\Http\Controllers\Controller;
use App\Models\Api\Tours\Tour;
use Exception;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tour::first() ? json_encode(['code'=>200, 'result'=> Tour::all()]) : json_encode(['code'=>100, 'result'=>'not found']);  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([

            'code' => 'required|string|unique:tours',
            'name' => 'required|string|unique:tours',
            'description' => 'required',
            'category' => 'required',
            'includes' => 'required',
            'additional' => 'required',
            'p_web_plus' => 'required|numeric', 
            'p_web_less' => 'required|numeric',
            'p_brouchure_rack' => 'required|numeric',
            'p_brouchure_neto' => 'required|numeric',
            'p_brouchure_comission' => 'required|numeric',
            'status' => 'required|numeric',
            'to_brouchure' => 'required|numeric',
            'to_web' => 'required|numeric',
            'to_seasonal' => 'required|string',
            'username' => 'required|string',

        ]);
  
        return json_encode(['code'=>200, 'result'=> Tour::create($storeData)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tour::find($id) ? json_encode(['code'=>200, 'result'=>Tour::find($id)]) : json_encode(['code'=>100, 'result'=>'not found']);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tour = Tour::find($id);
        if($tour){
            $request->validate([

                'code' => 'string|unique:tours,code',
                'name' => 'string|unique:tours,name',
                'username' => 'required|string',
    
            ]);
            $tour->update($request->all());
            return json_encode(['code'=>200, 'result'=>$tour]);
        }else{
            return json_encode(['code'=>100, 'result'=>'not found']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Tour::destroy($id) ? json_encode(['code'=>200, 'result'=>1]) : json_encode(['code'=>100, 'result'=>'not found']);
    }
}
