<?php

namespace App\Http\Controllers\Api\Tours;

use App\Http\Controllers\Controller;
use App\Models\Api\Tours\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::first() ? json_encode(['code'=>200, 'result'=> Category::all()]) : json_encode(['code'=>100, 'result'=>'not found']);  
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
        $storeData = $request->validate([

            'category' => 'required|string|unique:categories',

        ]);
  
        return json_encode(['code'=>200, 'result'=> Category::create($storeData)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id) ? json_encode(['code'=>200, 'result'=>Category::find($id)]) : json_encode(['code'=>100, 'result'=>'not found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $category = Category::find($id);
        if($category){
            $request->validate([

                'category' => 'required|string|unique:categories,category',
    
            ]);
            $category->update($request->all());
            return json_encode(['code'=>200, 'result'=>$category]);
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
        Category::destroy($id);
    }
}
