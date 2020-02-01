<?php

namespace App\Http\Controllers;
use App\Model\cos;
use App\Model\Clients;
use App\Model\mtncotumer;
use App\Model\Activities;
use App\Bmw;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientAccountsController extends Controller
{
    public function DataDownload()
    {
  //      $posts=  cos::all();
  // //  $posts=  cos::where('balance', '!=' , 0)->get();
  // // $posts=  cos::where('gender', '=' ,'m&f' )->get();
  //       return view('pages.data')->with('posts', $posts);
  //       'TICKECT', $TICKECT,'re', $re,

      //  $TICKECT=  Activities::all();
$re='All';
//  $posts=  mtncotumer::where('platoon','=','Wood Wind')->get();
//  $posts=  mtncotumer::where('platoon','=','Keyboard')->get();
//$posts=  mtncotumer::where('platoon','=','Strings')->get();
      // $posts=  mtncotumer::where('platoon','=','Brass')->get();
        //$posts=  mtncotumer::where('platoon','=','Percussion')->get();
 //$posts=  mtncotumer::all();
 $posts=  mtncotumer::where('ch','=','1')->get();
        return view('pages.data' , compact('posts', $posts,'re', $re));
    }

    public function ticketsDownload()
    {
    //  $posts=  Clients::where('won', '=' ,'1' )->get();
    $posts=  Clients::all();
       return view('pages.tickets')->with('posts', $posts);
    }

    public function DataattendDownload()
    {
      $posts= DB::table('wedding')->where('attend', '!=', 1)->get();
    //  $posts=  Clients::where('won', '=' ,'1' )->get();
    //  $posts=  Clients::all();
         return view('pages.attendance')->with('posts', $posts);


    }

    public function sendbulkEmail(Request $request)
    {
    $items = DB::table('wedding')->where('id',$request->get('id'))->update(array(
                                 'attend'=>1,'author'=>Auth::user()->name));

      $message ='Ticket has been successfully Validated Thank You.....!';

    return response()->json([
       'error' => '0',
       'status'  => $message,
    ], 200);
    }

    public function valguestDownload()
    {
      $posts= DB::table('wedding')->where('attend', '=', 1)->get();
    //  $posts=  Clients::where('won', '=' ,'1' )->get();
    //  $posts=  Clients::all();
         return view('pages.validattendance')->with('posts', $posts);
    }


}
