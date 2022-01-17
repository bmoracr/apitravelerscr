<?php
namespace App\Http\Controllers\Api\Tours;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tours\ToursCollection;
use App\Http\Resources\Tours\ToursResource;
use App\Models\Api\Tours\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tour::first() ? json_encode([new ToursCollection(Tour::all())]) : json_encode(['code'=>100, 'result'=>'not found']);
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
            'category_id' => 'required',
            'includes' => 'required',
            'extras' => 'required',
            'p_web_plus' => 'required|numeric', 
            'p_web_less' => 'required|numeric',
            'p_brouchure_rack' => 'required|numeric',
            'p_brouchure_neto' => 'required|numeric',
            'p_brouchure_comission' => 'required|numeric',
            'status' => 'required|numeric',
            'to_brouchure' => 'required|numeric',
            'to_web' => 'required|numeric',
            'to_seasonal' => 'required|string',
            'userId' => 'required|integer',
            'image' => 'exclude_if:image,null|exclude_if:image,false|file|mimes:jpg,bmp,png|max:1024',
        ]);
        $image_to_array = (empty($storeData['image']) || $storeData['image'] == false || $storeData['image'] == null) ? null 
                            : Storage::put('public/toursImages',  $request->file('image', 'public'));

        $storeData = Arr::set($storeData, 'image', $image_to_array);
        return json_encode([
                                'code'=>200, 
                                'result'=> new ToursResource(Tour::findOrFail(Tour::create($storeData)->id))
                            ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Tour::find($id) ? json_encode([
                    'code'=>200, 
                    'result'=> new ToursResource(Tour::findOrFail($id))
                ]) : json_encode([
                        'code'=>100, 
                        'result'=>'not found'
                    ]);
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

        $storeData = $request->validate([
            'code' => [
                'string',
                Rule::unique('tours')->ignore($tour->id),
            ],
            'name' => [
                'string',
                Rule::unique('tours')->ignore($tour->id),
            ],
            'description' => '',
            'category_id' => '',
            'includes' => '',
            'extras' => '',
            'p_web_plus' => 'numeric', 
            'p_web_less' => 'numeric',
            'p_brouchure_rack' => 'numeric',
            'p_brouchure_neto' => 'numeric',
            'p_brouchure_comission' => 'numeric',
            'status' => 'numeric',
            'to_brouchure' => 'numeric',
            'to_web' => 'numeric',
            'to_seasonal' => 'string',
            'userId' => 'required|integer',
            'image' => 'exclude_if:image,null|exclude_if:image,false|file|mimes:jpg,bmp,png|max:1024',
        ]);
        if($tour){ 
            if($request->image){
                Storage::delete($tour->image);
                $image_to_array = Storage::put('public/toursImages',  $request->file('image'));  
                $storeData = Arr::set($storeData, 'image', $image_to_array);              
            }
            $tour->update($storeData);
            return new ToursResource(Tour::findOrFail($id));          
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
