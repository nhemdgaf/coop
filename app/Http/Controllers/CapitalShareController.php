<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapitalShareRequest;
use App\Models\CapitalShare;
use Illuminate\Http\Request;

class CapitalShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all records in capital share
        $capitalShares = CapitalShare::all();
        return response()->json([
            'status'        => true,
            'capitalShares' => $capitalShares
        ]);
    }

    /**
     * Update or create new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCapitalShareRequest $request)
    {
        $capitalShare = CapitalShare::create($request->all());

        return response()->json([
            'status'        => true,
            'message'       => "Capital Share created successfully!",
            'capitalShare'  => $capitalShare
        ], 200);
    }

    /**
     * Update or create new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addOrUpdateContribution(StoreCapitalShareRequest $request)
    {
        $data = [];
        $data['full_name'] = $request->full_name;
        $data[$request->month] = $request->contribution;

        $capitalShare = CapitalShare::where('full_name', '=', $request->full_name)->firstOrFail();

        if($capitalShare->count() != 0){
            $capitalShare->update($data);
            $msg = 'Capital Share updated successfully!';
        }else{
            $capitalShare->create($data);
            $msg = 'Capital Share created successfully!';
        }

        return response()->json([
            'status'        => true,
            'message'       => $msg,
            'capitalShare'  => $capitalShare
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CapitalShare  $capitalShare
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCapitalShareRequest $request, CapitalShare $capitalShare)
    {
        $capitalShare->update($request->all());
        return response()->json([
            'status'        => true,
            'message'       => "Capital Share updated successfully!",
            'capitalShare'  => $capitalShare
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CapitalShare  $capitalShare
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapitalShare $capitalShare)
    {
        dd('delete');
        $capitalShare->delete();
        return response()->json([
            'status'    => true,
            'message'   => "Capital Share deleted successfully!"
        ], 200);
    }
}
