<?php

namespace App\Model;
use App\Model\Checkin;
use App\Model\Activities;

use Illuminate\Database\Eloquent\Model;

class mtncotumer extends Model
{
  protected $fillable = [
      'name','hotel', 'platoon', 'phone','id','email','ivcode','reg','room','gender','ch'
  ];

  public function customer()
  {
      return $this->HasMany( Checkin::class,'reg','reg');
  }

  public static function someStatic($par1) {
    return  $posts=mtncotumer::where('platoon',$par1)->count();
  }

  public static function someStatic2($par1) {
  //  $posts=Checkin::where('reg',$par2)->where('groups',$par1)->count();
    //dd($posts);
    return  $posts=Checkin::where('groups',$par1)->count();
  }


  public static function unqi($par1) {
  $posts=Checkin::distinct()->select('groups')->where('acti_id','=', $request->get('ac'))->groupBy('groups')->count();
  //  $posts=Checkin::where('reg',$par2)->where('groups',$par1)->count();
    //dd($posts);
    return  $posts;
  }

  public static function actiinfo($par1)
{
 $posts=Activities::where('acti_id',$par1)->first();
 return $posts->name;
}

public static function usersinfo323($par1)
{
  $ph="234803200".$par1;
  $posts=mtncotumer::where('phone', $ph)->orWhere('reg', $par1)->first();
//$posts=mtncotumer::where('acti_id',$par1)->first();
return $posts->name;
}

public static function phoneinfo2($par1)
{
  $ph="234803200".$par1;
  $posts=mtncotumer::where('phone', $ph)->orWhere('reg', $par1)->first();
//$posts=mtncotumer::where('acti_id',$par1)->first();
return $posts->phone;
}

public static function usersinfo($par1)
{
  $ph="234803200".$par1;
$posts=mtncotumer::where('phone', $ph)->orWhere('reg', $par1)->orWhere('ivcode', $par1)->first();
//$posts=mtncotumer::where('acti_id',$par1)->first();
return $posts->name;
}
public static function usersinfogroup($par1)
{
    $ph="234803200".$par1;
  $posts=mtncotumer::where('phone', $ph)->orWhere('reg', $par1)->orWhere('ivcode', $par1)->first();
//$posts=mtncotumer::where('acti_id',$par1)->first();
return $posts->platoon;
}
public static function phoneinfo($par1)
{
  $ph="234803200".$par1;
$posts=mtncotumer::where('phone', $ph)->orWhere('reg', $par1)->orWhere('ivcode', $par1)->first();
//$posts=mtncotumer::where('acti_id',$par1)->first();
return $posts->phone;
}





}
