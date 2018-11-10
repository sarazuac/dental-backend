<?php

namespace App\Http\Controllers;

use App\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Datetime;

class TimestampController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getTimestamps(){

            $timestamp = Timestamp::all();
            $response = [
                'timestamps' => $timestamp
            ];
            return response()->json($response, 200);

    }
    public function getTimestampsByUser(Request $request, $user_id){

        $timestamp = Timestamp::where('user_id', '=', $user_id)->get();;
        $response = [
            'timestamps' => $timestamp
        ];
        return response()->json($response, 200);

}
    public function postClockIn(Request $request){

        $timestamp = new Timestamp();
        $timestamp->user_id = $request->input('user_id');
        $timestamp->clocked_in_at = new DateTime();        ;
        $timestamp->save();
        return response()->json(['timestamp' =>$timestamp], 201);

    }
    public function putClockIn(Request $request, $id){

        $timestamp = new Timestamp();
        $timestamp->user_id = $request->input('user_id');
        $timestamp->clocked_in_at = new DateTime();        ;
        $timestamp->save();
        return response()->json(['timestamp' =>$timestamp], 201);

    }
    public function postLunchIn(Request $request, $id){
        $timestamp = Timestamp::find($id);
        if(!$timestamp){
            return response()->json(['message' => 'Timestamp not found'], 404);
        }
        $timestamp->lunch_in_at = new DateTime();
        $timestamp->save();
        return response()->json(['timestamp' => $timestamp], 200);
    }
    public function postLunchOut(Request $request, $id){
        $timestamp = Timestamp::find($id);
        if(!$timestamp){
            return response()->json(['message' => 'Timestamp not found'], 404);
        }
        $timestamp->lunch_out_at = new DateTime();
        $timestamp->save();
        return response()->json(['timestamp' => $timestamp], 200);
    }
    public function postClockOut(Request $request, $id){
        $timestamp = Timestamp::find($id);
        if(!$timestamp){
            return response()->json(['message' => 'Timestamp not found'], 404);
        }
        $timestamp->clocked_out_at = new DateTime();
        $timestamp->save();
        return response()->json(['timestamp' => $timestamp], 200);
    }
    public function deleteTimestamp(Request $request, $id){
        $timestamp = Timestamp::find($id);
        if(!$timestamp){
            return response()->json(['message' => 'Timestamp not found'], 404);
        }
        $timestamp->delete();
        return response()->json(['message' => 'Timestamp deleted'], 200);
    }






    //
}
