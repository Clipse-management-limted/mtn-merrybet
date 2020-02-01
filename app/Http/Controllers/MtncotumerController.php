<?php

namespace App\Http\Controllers;
use App\Model\mtncotumer;
use App\Model\Activities;
use App\Mail\MailMember2;
use App\Model\Checkin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class MtncotumerController extends Controller
{
  public function reg()
  {
        return view('pages.reg');
  }

  public function self()
  {
        return view('pages.self');
  }
  public function iv2()
  {
    $TICKECT=  Activities::all();
   return view('pages.iv2')->with('TICKECT', $TICKECT);
  }

  // public function total()
  // {
  //       return view('pages.total');
  // }

  public function iv()
  {

    $TICKECT=  Activities::all();
   return view('pages.iv')->with('TICKECT', $TICKECT);

  }




public function chart()
  {
    $result = DB::table('mtncotumers')
            ->select(DB::raw('count(platoon) as count'),'mtncotumers.platoon')
            ->groupBy('platoon')
            ->orderBy('count','desc')
            ->get();
          //  dd($result);
    // $result = \DB::table('mtncotumers')
    //             ->distinct('platoon')
    //             //   ->distinct('platoon','=','Infosys')
    //             // ->orderBy('stockYear', 'ASC')
    //             ->get();
    return response()->json($result);
  }


    public function total()
    {
      return view('pages.total');
    }

    public function fetchac(Request $request)
    {
      $TICKECT=  Activities::all();
         $posts=Checkin::where('acti_id', $request->get('ac'))->get();
      //   dd($posts);

     return view('pages.attendanceact', compact('TICKECT', $TICKECT,'posts',$posts));
    }


public function fetreport(Request $request)
{
//  $this->chart2('32511');
  $TICKECT=  Activities::all();
  $acti_id=$request->get('ac');
  //$re=Checkin::distinct()->select('groups')->where('acti_id','=', $request->get('ac'))->groupBy('groups')->get();
  $re=DB::table('checkins')->select('groups', 'acti_id', DB::raw('count(groups) as total'))
    ->groupBy('groups')
    ->groupBy('acti_id')
    ->where('acti_id','=', $request->get('ac'))
    ->get();
$this->chart2($acti_id);
      //  $re=Checkin::where('acti_id', $request->get('ac'))->distinct('groups')->get();
    // dd($re);

 return view('pages.report', compact('TICKECT', $TICKECT,'re',$re,'acti_id',$acti_id));
}

public function chart2($acti_id)
  {
  //dd($acti_id);
    $request=$acti_id;

    $result1 = DB::table('checkins')
            ->select(DB::raw('count(groups) as count'),'checkins.groups')
            ->groupBy('groups')
            ->orderBy('count','desc')
            ->where('acti_id','=', $request)
            ->get();


//dd($this->request);
    // $result1 = DB::table('checkins')->select('groups', 'acti_id', DB::raw('count(groups) as total'))
    //   ->groupBy('groups')
    //   ->groupBy('acti_id')
    //   ->where('acti_id','=', $request)
    //   ->get();
          //  dd($result1);
    // $result = \DB::table('mtncotumers')
    //             ->distinct('platoon')
    //             //   ->distinct('platoon','=','Infosys')
    //             // ->orderBy('stockYear', 'ASC')
    //             ->get();
    return response()->json($result1);
  }

public function report()
{
  //  return view('pages.report');
    $TICKECT=  Activities::all();
   $re=DB::table('mtncotumers')->distinct('platoon')->get();
    return view('pages.report' , compact('TICKECT', $TICKECT,'re', $re));
}

  public function checkin()
  {
     $TICKECT=  Activities::all();
    return view('pages.checkin')->with('TICKECT', $TICKECT);
  }

  public function attenance_activi()
  {
    $TICKECT=  Activities::all();
    $posts=Checkin::all();
     return view('pages.attendanceact', compact('TICKECT', $TICKECT,'posts',$posts));
  }



  public function sendmtncosEmail(Request $request)
    {
    //   $this->validate($request, [
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|max:255',
    //     'phone_no' =>['required','numeric','min:0'],
    //     'gender' => 'required|string|max:255',
    //
    // ]);
    $ph="234803200".$request->get('phone_no');
  $rew=DB::table('hris')->where('Phone_Number',$ph)->first();
  $s='2';
  $s3='3';
     $s2='1';
  $re=mtncotumer::where('hotel', $s)->count();
 $re2=mtncotumer::where('hotel', $s2)->count();
 $re3=mtncotumer::where('hotel', $s3)->count();
//  $re='63';
//  $re2='220';
  echo'Lagos Continental '. $re2 .'<br> Eko Hotel '.$re.'<br> Eko Signature '.$re3;


//   if($rew)
//   {
//
//
//     $rew2=DB::table('mtncotumers')->where('phone',$ph)->first();
//   if($rew2)
//   {
//     $message ='Hello '.$rew->name.' You Already  Registered Thank You .....!';
//
//   return response()->json([
//      'error' => '1',
//      'status'  => $message,
//   ], 200);
//   }else{
//
//
//   //dd($rew);
//   //
//   if($rew->Room_Choice!='')
//   {
//
//       $hot= $rew->Room_Choice;
//         $group = $rew->Grouping;
//       //  echo $hot;
//         if($hot =='Lagos Continental' ){
//               $hotel='1';
//         }
//         else{
//             $hot='Eko Hotel';
//             $hotel='2';
//
//         }
//
//
//   }else {
//     $hotel=mt_rand(1,2);
//     $s='2';
//     $s2='1';
//    $re=mtncotumer::where('hotel', $s)->count();
//   $re2=mtncotumer::where('hotel', $s2)->count();
//     // $re='93';
//     // $re2='220';
//     //echo $s .'show '.$re;
//     // dd($re);
//
//     if($re =='93')
//     {
//     //   if($re2 =='220')
//     //   {
//     //     $hotel='0';
//     //     $hot=' ';
//     //   //  echo $hot;
//     // }else{
//       $hotel='1';
//       $hot='Lagos Continental';
//     //  echo $hot;
//   //  }
//
//     }
//     else {
//       if($hotel =='1')
//       {
//         // if($re2 =='220')
//         // {
//         //   $hotel='2';
//         //   $hot='Eko Hotel';
//         // //  echo $hot;
//         // }
//         //  else {
//             $hot='Lagos Continental';
//       //   }
//
//         //  echo $hot;
//       }
//       else
//       {
//         $hot='Eko Hotel';
//       //  echo $hot;
//       }
//     }
//
//
//   }
//
//
//
//
//     $rab=mt_rand(1,5);
//
//     if($rab == '1')
//     {
//       $rabp='Brass';
//     }
//     elseif($rab == '2')
//     {
//       $rabp='Keyboard';
//     }
//     elseif($rab == '3')
//     {
//       $rabp='Strings';
//     }
//     elseif($rab == '4')
//     {
//       $rabp='Wood Wind';
//     }
//     elseif($rab == '5')
//     {
//       $rabp='Percussion';
//     }
//     else
//     {
//
//     }
//
// // echo $rabp;
// // echo $hot;
// // echo $hotel;
//     // dd($rabp);
//
//
//             // if($items->exists)
//             // {
//
//               $rand=rand(100,9999);
//               $t=$rand;
//                 // $number = rand(100,1000);
//                 // $t=time();
//                 // $rand = $number.''.$t;
//                 $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
//                             ->format('png')->size(800)
//                             ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//               // $qrCode=\QrCode::size(1000)
//               //   ->format('png')
//               //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//                 $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
//         $contactSubject = 'Sales 2020 Conference! ';
//
//           // $c_message =  '<p>Hi,</p>
//           //   <p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
//           //   <p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
//           //   <p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
//           //   <p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
//           //   '.$qrCode.'
//           //
//           //   <p>Attached is your ticket for updates:</p>
//           //   <p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
//           //    <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
//           //   <p>We look forward to welcoming you!</p></br>
//           //   <p>Regards</P> </br>
//           //   <p>Kelechi </p>
//           //   <p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$qrCode.'</b>at the event point of entry.</p> ';
//         //dd($request->name.'_'.$rand);
//             $img2 =public_path().'/img/Picture1.jpg';
//                 $img3 =public_path().'/img/mtn/favicon-32x32.png';
//
//           $data = array(
//                              'name' => $request->name,
//                                 'email'=>$request->email,
//                               'contactSubject'=>$contactSubject,
//                                 'messagetext'=>$c_message,
//                                 'images'=>$img,
//                                 'ran'=>$rand,
//                                 'app_name' => config('app.name'),
//                                 'qrCode'    =>$rand,
//                                 'img' => $img2,
//                                 'img3' => $img3,
//                                 'rab'=> $rab,
//                                 'hot' =>$hot,
//                                 'group' =>$group
//
//                             );
//                        //     dd($data);
//                        Mail::send('mails.bulk', $data, function ($message) use ($request){
//
//                          $to_email = $request->email;
//                          $to_name  = $request->name;
//                          $subject  = $request->contactSubject;
//                          $message->sender('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                          $message->replyTo('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                            $message->from('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                          $message->subject('Sales Conference 2020!');
//                             $message->bcc("kennygendowed@gmail.com");
//                             $message->bcc("clipsemgt@gmail.com");
//                             $message->to($to_email, $to_name);
//                        });
//
//                 if(count(Mail::failures()) > 0){
//                     $status = 'Error something Went Wrong';
//                     dd("error");
//                 } else {
//
// //     $rew=DB::table('mtncotumer')->where('phone',$ph)->first();
// // if($rew)
// // {
// //   $items = mtncotumer::where('phone', $ph)
// //             ->update(['ivcode' => $t]);
// // }else{
// //
// // }
//
//
//                   $item =  mtncotumer::create(array(
//                              'name' =>$request->get('name'),
//                               'email' =>$request->get('email'),
//                               'phone' => $ph,
//                               'gender' =>$request->get('gender'),
//                               'platoon' => $rabp,
//                               'hotel'  => $hotel,
//                                 'ivcode' => $t,
//                                   'reg' => 0,
//
//                              ));
//
//
//                         // $item =  bulkemails::create(array(
//                         //            'CUSTOMER_NAME' =>$request->get('name'),
//                         //             'PHONE' =>$request->get('phone_no'),
//                         //             'EMAIL' => $request->get('email'),
//                         //             'TICKET_CATEGORY' => $request->get('ticket'),
//                         //             'STATUS_SentUnsent'  =>0,
//                         //              'ivcode' => 0,
//                         //
//                         //            ));
//
//                    // $items = bulkemails::where('EMAIL', $request->email)
//                    //           ->where('CUSTOMER_NAME',$request->name)->update([ 'STATUS_SentUnsent' =>1,
//                    //             'ivcode' => $t
//                    //          ]);
//
//
//
//                   //  $status = 'Mail Sent Successfully Thank You ....';
//                 }
//
//
//
//                   $message ='User has been successfully Registered Thank You .....!';
//
//               return response()->json([
//                    'error' => '0',
//                    'status'  => $message,
//                ], 200);
//
//             // }
//             // else {
//             //
//             //       $message ='Sorry Please Try Again  .....!';
//             //
//             //   return response()->json([
//             //        'error' => '1',
//             //        'status'  => $message,
//             //    ], 500	);
//             // }
//
//
//     //       echo json_encode($status);
//     // exit;
//
// // return redirect()->back()->with('status', $status );
// }
// }
// else{
//   $message ='Hello '.$request->get('name').' Sorry Registration Unavailable  Thank You .....!';
//
// return response()->json([
//    'error' => '1',
//    'status'  => $message,
// ], 200);
//
// }

    }

    public function generate_qrcode(Request $request)
      {
            $this->validate($request, [
              'name' => 'required|string|max:255',
              'email' => 'required|string|max:255',
              'phone_no' =>['required','numeric','min:0'],
              'gender' => 'required|string|max:255',
              'hotel'  => 'required|string|max:255',

          ]);
          $name=$request->name;
          $rp="01";

          $rand=rand(100,9999);
          $t=$rand;
            // $number = rand(100,1000);
            // $t=time();
            // $rand = $number.''.$t;
            $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                        ->format('png')->size(800)
                        ->generate($rand, public_path('qrcode2/'.$name.'_'.$rand.'_qrcode.png'));

            $item =  mtncotumer::create(array(
                       'name' =>$request->get('name'),
                        'email' =>$request->get('email'),
                        'phone' => $request->get('phone_no'),
                        'gender' =>$request->get('gender'),
                        'platoon' => $rp,
                        'hotel'  => $request->get('hotel'),
                          'ivcode' => $t,
                            'reg' => 0,

                       ));

            $message ='User has been successfully Registered Thank You .....!';

        return response()->json([
             'error' => '0',
             'status'  => $message,
         ], 200);


      }

  public function sendmtncosEmail2(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'phone_no' =>['required','numeric','min:0'],
        'gender' => 'required|string|max:255',
        'hotel'  => 'required|string|max:255',

    ]);

    $ph="234803200".$request->get('phone_no');
  $rew=DB::table('hris')->where('Phone_Number',$ph)->first();



      if($rew)
      {


        $rew2=DB::table('mtncotumers')->where('phone',$ph)->first();
      if($rew2)
      {
        $message ='Hello '.$rew->name.' You Already  Registered Thank You .....!';

      return response()->json([
         'error' => '1',
         'status'  => $message,
      ], 200);
      }else{


      //dd($rew);
      //
      if($rew->Room_Choice!='')
      {
          $hot= $rew->Room_Choice;
            $group = $rew->Grouping;
          //  echo $hot;
            if($hot =='Lagos Continental' ){
                  $hotel='1';
            }
            else{
                $hot='Eko Signature';
                $hotel='3';

            }


      }else {
        $hotel=mt_rand(1,2);
        $s='2';
        $s2='1';
       $re=mtncotumer::where('hotel', $s)->count();
      $re2=mtncotumer::where('hotel', $s2)->count();
        // $re='93';
        // $re2='220';
        //echo $s .'show '.$re;
        // dd($re);

        if($re =='93')
        {
        //   if($re2 =='220')
        //   {
        //     $hotel='0';
        //     $hot=' ';
        //   //  echo $hot;
        // }else{
          $hotel='1';
          $hot='Lagos Continental';
        //  echo $hot;
      //  }

        }
        else {
          if($hotel =='1')
          {
            // if($re2 =='220')
            // {
            //   $hotel='2';
            //   $hot='Eko Hotel';
            // //  echo $hot;
            // }
            //  else {
                $hot='Lagos Continental';
          //   }

            //  echo $hot;
          }
          else
          {
            $hot='Eko Hotel';
          //  echo $hot;
          }
        }


      }



$rab=$request->get('hotel');
      //  $rab=mt_rand(1,5);

        if($rab == '1')
        {
          $rabp='Brass';
        }
        elseif($rab == '2')
        {
          $rabp='Keyboard';
        }
        elseif($rab == '3')
        {
          $rabp='Strings';
        }
        elseif($rab == '4')
        {
          $rabp='Wood Wind';
        }
        elseif($rab == '5')
        {
          $rabp='Percussion';
        }
        else
        {

        }

    // echo $rabp;
    // echo $hot;
    // echo $hotel;
        // dd($rabp);


                // if($items->exists)
                // {

                  $rand=rand(100,9999);
                  $t=$rand;
                    // $number = rand(100,1000);
                    // $t=time();
                    // $rand = $number.''.$t;
                    $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
                                ->format('png')->size(800)
                                ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                  // $qrCode=\QrCode::size(1000)
                  //   ->format('png')
                  //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
                    $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
            $contactSubject = 'Sales 2020 Conference! ';

              // $c_message =  '<p>Hi,</p>
              //   <p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
              //   <p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
              //   <p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
              //   <p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
              //   '.$qrCode.'
              //
              //   <p>Attached is your ticket for updates:</p>
              //   <p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
              //    <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
              //   <p>We look forward to welcoming you!</p></br>
              //   <p>Regards</P> </br>
              //   <p>Kelechi </p>
              //   <p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$qrCode.'</b>at the event point of entry.</p> ';
            //dd($request->name.'_'.$rand);
                $img2 =public_path().'/img/Picture1.jpg';
                    $img3 =public_path().'/img/mtn/favicon-32x32.png';

              $data = array(
                                 'name' => $request->name,
                                    'email'=>$request->email,
                                  'contactSubject'=>$contactSubject,
                                    'messagetext'=>$c_message,
                                    'images'=>$img,
                                    'ran'=>$rand,
                                    'app_name' => config('app.name'),
                                    'qrCode'    =>$rand,
                                    'img' => $img2,
                                    'img3' => $img3,
                                    'rab'=> $rab,
                                    'hot' =>$hot,
                                    'group' =>$group

                                );
                           //     dd($data);
                           Mail::send('mails.bulk', $data, function ($message) use ($request){

                             $to_email = $request->email;
                             $to_name  = $request->name;
                             $subject  = $request->contactSubject;
                             $message->sender('tickets@celebrityfc.ng', 'Sales Conference 2020!');
                             $message->replyTo('tickets@celebrityfc.ng', 'Sales Conference 2020!');
                               $message->from('tickets@celebrityfc.ng', 'Sales Conference 2020!');
                             $message->subject('Sales Conference 2020!');
                                $message->bcc("kennygendowed@gmail.com");
                              //  $message->bcc("clipsemgt@gmail.com");
                                $message->to($to_email, $to_name);
                           });

                    if(count(Mail::failures()) > 0){
                        $status = 'Error something Went Wrong';
                        dd("error");
                    } else {

    //     $rew=DB::table('mtncotumer')->where('phone',$ph)->first();
    // if($rew)
    // {
    //   $items = mtncotumer::where('phone', $ph)
    //             ->update(['ivcode' => $t]);
    // }else{
    //
    // }


                      $item =  mtncotumer::create(array(
                                 'name' =>$request->get('name'),
                                  'email' =>$request->get('email'),
                                  'phone' => $ph,
                                  'gender' =>$request->get('gender'),
                                  'platoon' => $rabp,
                                  'hotel'  => $hotel,
                                    'ivcode' => $t,
                                      'reg' => 0,

                                 ));


                            // $item =  bulkemails::create(array(
                            //            'CUSTOMER_NAME' =>$request->get('name'),
                            //             'PHONE' =>$request->get('phone_no'),
                            //             'EMAIL' => $request->get('email'),
                            //             'TICKET_CATEGORY' => $request->get('ticket'),
                            //             'STATUS_SentUnsent'  =>0,
                            //              'ivcode' => 0,
                            //
                            //            ));

                       // $items = bulkemails::where('EMAIL', $request->email)
                       //           ->where('CUSTOMER_NAME',$request->name)->update([ 'STATUS_SentUnsent' =>1,
                       //             'ivcode' => $t
                       //          ]);



                      //  $status = 'Mail Sent Successfully Thank You ....';
                    }



                      $message ='User has been successfully Registered Thank You .....!';

                  return response()->json([
                       'error' => '0',
                       'status'  => $message,
                   ], 200);

                // }
                // else {
                //
                //       $message ='Sorry Please Try Again  .....!';
                //
                //   return response()->json([
                //        'error' => '1',
                //        'status'  => $message,
                //    ], 500	);
                // }


        //       echo json_encode($status);
        // exit;

    // return redirect()->back()->with('status', $status );
    }
    }
    else{
      $message ='Hello '.$request->get('name').' Sorry Registration Unavailable  Thank You .....!';

    return response()->json([
       'error' => '1',
       'status'  => $message,
    ], 200);

    }












// $hotel=$request->get('hotel');
// // $s='2';
// // $re=mtncotumer::where('hotel', $s)->count();
// // //$re='63';
// // //echo $s .'show '.$re;
// // // dd($re);
// // if($re =='63')
// // {
// //   $hotel='1';
// //   $hot='Lagos Continental';
// // }
// // else {
//   if($hotel =='1')
//   {
//     $hot='Lagos Continental';
//   }
//   else
//   {
//     $hot='Eko Signature';
//   }
// // }
//
//
//   $rp="NULL";
//     // dd($rabp);
//
//
//             // if($items->exists)
//             // {
//
//               $rand=rand(100,9999);
//               $t=$rand;
//                 // $number = rand(100,1000);
//                 // $t=time();
//                 // $rand = $number.''.$t;
//                 $qrCode= \QrCode::backgroundColor(255, 255, 0)->color(255, 0, 127)
//                             ->format('png')->size(800)
//                             ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//               // $qrCode=\QrCode::size(1000)
//               //   ->format('png')
//               //   ->generate($rand, public_path('qrcode/'.$rand.'_qrcode.png'));
//                 $img =public_path().'/qrcode/'.$rand.'_qrcode.png';
//         $contactSubject = 'Sales 2020 Conference! ';
//
//           // $c_message =  '<p>Hi,</p>
//           //   <p>Thanks for registering to attend Edu360, powered by Union Bank!</p>
//           //   <p>The 3-day event themed "Education beyond walls" will hold on October 24th-26th, 2019 from 9:00am to 5:00pm each day.</p>
//           //   <p> Venue : Union Bank Sport Club, Bode Thomas Street Surulere, Lagos</p>
//           //   <p> At Edu360, there will be a range of activities for you to experience, including exhibition, panel, workshop,training as well as fun and educational activities for students. Get ready to meet and network with other parents, learn from expert and enjoy informative sessions!</p>
//           //   '.$qrCode.'
//           //
//           //   <p>Attached is your ticket for updates:</p>
//           //   <p> Join the conversation using the hashtag #edu360 Tweet to @unionbank_ng</br> <p>Look out for more information on edu360.ng</p></br>
//           //    <p> If you have any question leading up to the event, you can send us mail at  edu360@unionbankng.com</p></br>
//           //   <p>We look forward to welcoming you!</p></br>
//           //   <p>Regards</P> </br>
//           //   <p>Kelechi </p>
//           //   <p>Kindly confirm invite below and provide attached QR code or use invite code <br /><b style="font-size: 30px">'.$qrCode.'</b>at the event point of entry.</p> ';
//         //dd($request->name.'_'.$rand);
//             $img2 =public_path().'/img/Picture1.jpg';
//                 $img3 =public_path().'/img/mtn/favicon-32x32.png';
//
//           $data = array(
//                              'name' => $request->name,
//                                 'email'=>$request->email,
//                               'contactSubject'=>$contactSubject,
//                                 'messagetext'=>$c_message,
//                                 'images'=>$img,
//                                 'ran'=>$rand,
//                                 'app_name' => config('app.name'),
//                                 'qrCode'    =>$rand,
//                                 'img' => $img2,
//                                 'img3' => $img3,
//                                 'rab'=> $rp,
//                                 'hot' =>$hot
//
//                             );
//                        //     dd($data);
//                        Mail::send('mails.bulk2', $data, function ($message) use ($request){
//
//                          $to_email = $request->email;
//                          $to_name  = $request->name;
//                          $subject  = $request->contactSubject;
//                          $message->sender('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                          $message->replyTo('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                            $message->from('tickets@celebrityfc.ng', 'Sales Conference 2020!');
//                          $message->subject('Sales Conference 2020!');
//                             $message->bcc("kennygendowed@gmail.com");
//                             $message->bcc("clipsemgt@gmail.com");
//                             $message->to($to_email, $to_name);
//                        });
//
//                 if(count(Mail::failures()) > 0){
//                     $status = 'Error something Went Wrong';
//                     dd("error");
//                 } else {
//
//
//
//
//                   $item =  mtncotumer::create(array(
//                              'name' =>$request->get('name'),
//                               'email' =>$request->get('email'),
//                               'phone' => $request->get('phone_no'),
//                               'gender' =>$request->get('gender'),
//                               'platoon' => $rp,
//                               'hotel'  => $hotel,
//                                 'ivcode' => $t,
//                                   'reg' => 0,
//
//                              ));
//
//
//                         // $item =  bulkemails::create(array(
//                         //            'CUSTOMER_NAME' =>$request->get('name'),
//                         //             'PHONE' =>$request->get('phone_no'),
//                         //             'EMAIL' => $request->get('email'),
//                         //             'TICKET_CATEGORY' => $request->get('ticket'),
//                         //             'STATUS_SentUnsent'  =>0,
//                         //              'ivcode' => 0,
//                         //
//                         //            ));
//
//                    // $items = bulkemails::where('EMAIL', $request->email)
//                    //           ->where('CUSTOMER_NAME',$request->name)->update([ 'STATUS_SentUnsent' =>1,
//                    //             'ivcode' => $t
//                    //          ]);
//
//
//
//                   //  $status = 'Mail Sent Successfully Thank You ....';
//                 }
//
//
//
//                   $message ='User has been successfully Registered Thank You .....!';
//
//               return response()->json([
//                    'error' => '0',
//                    'status'  => $message,
//                ], 200);
//
//             // }
//             // else {
//             //
//             //       $message ='Sorry Please Try Again  .....!';
//             //
//             //   return response()->json([
//             //        'error' => '1',
//             //        'status'  => $message,
//             //    ], 500	);
//             // }
//
//
//     //       echo json_encode($status);
//     // exit;
//
// // return redirect()->back()->with('status', $status );



    }



}
