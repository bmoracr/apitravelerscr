<?php

namespace App\Http\Controllers\Api\Travelerscr;

use App\Http\Controllers\Controller;
use App\Http\Resources\Travelerscr\TicketsResource;
use App\Models\Api\Travelerscr\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ticket::first() ? json_encode([new TicketsResource(Ticket::all())]) : json_encode(['code'=>100, 'result'=>'not found']);
        
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
            'tax' => 'required|numeric', 
            'subTotal' => 'required|numeric',
            'totalPrice' => 'required|numeric',
            'costumerCode' => 'required|string',
            'title' => 'required|string',
            'costumerName' => 'required|string',
            'email' => 'required|string',
            'phoneNumber' => 'required|string',
            'acceptTerms' => 'required|string',
            'productsId' => 'required|string',
        ]);
        return json_encode([
                                'code'=>200, 
                                'result'=> new TicketsResource(Ticket::findOrFail(Ticket::create($storeData)->id))
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
        return Ticket::find($id) ? json_encode([
            'code'=>200, 
            'result'=> new TicketsResource(Ticket::findOrFail($id))
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Ticket::destroy($id) ? json_encode(['code'=>200, 'result'=>1]) : json_encode(['code'=>100, 'result'=>'not found']);
    }
}
