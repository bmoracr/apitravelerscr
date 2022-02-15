<?php

namespace App\Http\Controllers\Api\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\Apps\App;
use App\Http\Resources\Apps\AppResource;
use Illuminate\Validation\Rule;

class AppsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return App::first() ? json_encode([new AppResource(App::all())]) : json_encode(['code'=>100, 'result'=>'not found']);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return App::find($id) ? json_encode([
            'code'=>200, 
            'result'=> new AppResource(App::findOrFail($id))
        ]) : json_encode([
                'code'=>100, 
                'result'=>'not found'
            ]);
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
        $app = App::find($id);

        $storeData = $request->validate([
            'app_id' => [
                'string',
                Rule::unique('tours')->ignore($app->app_id),
            ],
            'app_name' => [
                'string',
                Rule::unique('tours')->ignore($app->app_name),
            ],
            'comercial_name' => [
                'string',
                Rule::unique('tours')->ignore($app->app_name),
            ],
            'iva' => 'float',
            'phone_number' => 'string',
            'sociable_whatsapp' => 'string',
            'sociable_instagram' => 'string',
            'sociable_facebook' => 'string',
            'sociable_twiter' => 'string',
            'sociable_linkedin' => 'string',
            'description' => 'string',
        ]);
        if($app){ 
            $app->update($storeData);
            return new AppResource(App::findOrFail($id));          
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
        return App::destroy($id) ? json_encode(['code'=>200, 'result'=>1]) : json_encode(['code'=>100, 'result'=>'not found']);
    }
}
 