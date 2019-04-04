<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;
use App\Estimate;
use Illuminate\Support\Facades\DB;

class CostController extends Controller
{
    public function index()
	{
		return view('cost');
	}

	public function store(Request $request)
	{
         
           

           /* $temp = $request->input('product');
            $temp1 = $request->input('class');

           
                 
                $categories = Product::all();
		        return view('search')->with('categories',$categories)->with('temp',$temp)->with('temp1',$temp1);*/

		        

		         $length = $request->input('len');
            $breath = $request->input('bre');
            $lengthG = $request->input('lenG');
            $breathG = $request->input('breG');
            $WashRoom = $request->input('wash');
            $story = $request->input('sto');
           // $temp3 = $temp*$temp1;
            

          $countB = 0;
                                     $countS = 0;
                                     $countC = 0;
                                     $countT = 0;

                                     $xBricks = 0;
                                     $yBricks = 0;
                                     $zBricks = 0;

                                     $xSteel = 0;
                                     $ySteel = 0;
                                     $zSteel = 0;
                                     $qSteel = 0;
                                     $iSteel = 0;


                                     $xCement = 0;
                                     $yCement = 0;
                                     $zCement = 0;
                                     $qCement = 0;

                                     $xTiles = 0;
                                     $yTiles = 0;



                                     if(isset($_GET['search']))
                                     {

                                     	 $xBricks = $length * $breath * 18;
                                                   $yBricks = ((2*($length-$lengthG)) + (2*($breath-$breathG)))*9*11 ; 
                                                   $zBricks = ($yBricks/2);
                                                   $countB = $xBricks + ($story * $yBricks) + ($story * $zBricks);

                                                   $xSteel = ((2*$length)+(2*$breath))*6;
                                                   $ySteel = ((2*($length-$lengthG)) + (2*($breath-$breathG)))*0.7;
                                                   $zSteel = (($length-$lengthG) * ($breath-$breathG))*0.666;
                                                   $qSteel = 131;
                                                   $iSteel = ((2*($length-$lengthG)) + (2*($breath-$breathG)));

                                                   $xCement = ($length * $breath)/14;
                                                   $yCement = (((2*$length)+(2*$breath)) + ((2*($length-$lengthG)) + (2*($breath-$breathG))))/12;
                                                   $zCement = (($length-$lengthG) * ($breath-$breathG))/12;
                                                   $qCement = ((((2*($length-$lengthG)) + (2*($breath-$breathG)))*11) + (((2*$lengthG)+(2*$breathG))*5))/8;
                                                   $countC =  $xCement +  $yCement +  ($story*$zCement) +  ($story*$qCement);
                                           
                                                   $xTiles = (($length * $breath) - $lengthG - $breathG);
                                                   $yTiles = 300 * $WashRoom;
                                                   $countT = $story*($xTiles + $yTiles);


                                                    



                                                      if ($story == 1)
                                                      {

                                                      	$countS =  $xSteel +  $ySteel +  $zSteel +  $qSteel;
                                                      	

                                                      }
                                                      if ($story > 1)
                                                      {

                                                      	$countS =  $xSteel +  ($story * $ySteel) +  ($story * $zSteel) +  ($story * $qSteel)+ $iSteel;


                                                      }
                                                   


                                     }
             // return view('cost')->with('categories',$categories)->with('length',$length)->with('breath',$breath)->with('lengthG',$lengthG)->with('breathG',$breathG)->with('story',$story)->with('WashRoom',$WashRoom);
              // $data = array('bricks'->$countB,"steel"->$countS,"cements"->$countC,"tiles"->$countT);
              // DB::table('estimates')->insert($data);
                                     DB::table('estimates')->insert(
    ['bricks' => $countB, 'steels' => $countS , 'cements' => $countC , 'tiles' => $countT]
);
               return view('cost')->with('countB',$countB)->with('countS',$countS)->with('countC',$countC)->with('countT',$countT);
		
	}

public function store1(Request $request)
	{
        
        

		
		$brick = $request->input('classB');
		$steel = $request->input('classS');
		$cement = $request->input('classC');
		$tile = $request->input('classT');
		
		 $brick1 = Cost::all();

		 $steel1 = Cost::all();

		 $cement1 = Cost::all();

		 $tile1 = Cost::all();
    $est = Estimate::all();
      
      DB::table('estimates')->delete();




          return view('cost')->with('brick1',$brick1)->with('steel1',$steel1)->with('cement1',$cement1)->with('tile1',$tile1)->with('est',$est)->with('brick',$brick)->with('steel',$steel)->with('cement',$cement)->with('tile',$tile);

	}
	
	
}
?>