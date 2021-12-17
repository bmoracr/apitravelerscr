<?php
namespace App\Http\Controllers\Api\Users;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::first() ? json_encode(['code'=>200, 'result'=>User::all()]) : json_encode(['code'=>100, 'result'=>'not found']);  
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {         
            return User::find($id) ? json_encode(['code'=>200, 'result'=>User::find($id)]) : json_encode(['code'=>100, 'result'=>'not found']);
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
        $user = User::find($id);
        if($user){
            $request->validate([

                'phone' => 'string|unique:users,phone',
                'username' => 'string|unique:users,username',
                'email' => 'string|unique:users,email'
    
            ]);
            $user->update($request->all());
            return json_encode(['code'=>200, 'result'=>$user]);
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
        return User::destroy($id) ? json_encode(['code'=>200, 'result'=>'success']) : json_encode(['code'=>100, 'result'=>'not found']);
    }
}
