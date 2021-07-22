<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Leads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class registrationController extends Controller
{
    public function sendotp(Request $request)
    {
        //
		$phone = $request->input('phone');
		$length = 5;
		$randstr=0;
		$otp=array();
		srand((double) microtime(TRUE) * 1000000);
		//our array add all letters and numbers if you wish
		$chars = array(
		'1', '2', '3', '4', '5','6', '7', '8', '9');
						
		for ($rand = 0; $rand <= $length; $rand++) {
								$random = rand(0, count($chars) - 1);
								$randstr .= $chars[$random];
		}
						  
		
						
						$redmcode=$randstr;
		$messagepn = "Your Otp is ".$redmcode;
					$messagepn=str_replace(" ","%20",$messagepn);
		/* $ch = curl_init();
					curl_setopt($ch, CURLOPT_URL,"http://bulkpush.mytoday.com/BulkSms/SingleMsgApi?");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,"feedid=360644&username=9818682379&password=mwpta&To=".$phone."&Text=".$messagepn."&time=200812110950&senderid=testSenderID");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);       
					$response = curl_exec ($ch);       
					$err = curl_error($ch);					
					curl_close ($ch);
					if ($err) {
					  echo "cURL Error #:" . $err;
					} else {
						$otp['otp']=$redmcode;
					  echo json_encode($otp);
					} */
    }
	
	/*****
	register Function
	*/

    	public function register(Request $request)
        {

//            dd($request);
                $request->validate([
                    'name' => 'required|max:255',
                    'gender' => 'required',
                    'email' => 'required|email|max:255',
                    'phone' => 'required|numeric|regex:/^((?!(0))[0-9]{10})$/',
                ],
                    [
                        'phone.regex' => 'Number must be 10 digits and should not start with 0',
                    ]);

                $url = "https://battlefy.com/mgl/microgravity-gaming-league-fifa-21-1/60825c104fb3931a6fa9ce48/info";

                $create_leads = new Leads();
                $create_leads->name = $request->name;
                $create_leads->email = $request->email;
                $create_leads->phone_no = $request->phone;
                $create_leads->gender = $request->gender;

                $create_leads->ip = $request->ip();
                $create_leads->save();

//            echo "<script>window.open('".$url."', '_blank')</script>";


//            return redirect('https://battlefy.com/mgl/microgravity-gaming-league-fifa-21-1/60825c104fb3931a6fa9ce48/info')->with('msg',"Your registration is successful!");

            return redirect('/thankyou')->with('msg',"Thank you for sharing your details. Click on the button below to complete your registration.");

//            return redirect('/thankyou');


        }




//	public function register(Request $request)
//	{
//		$register = new App\Mcg_register();
//		$transaction = new App\Transaction_payu();
//		$api_log = new App\Api_log();
//		$api_log1 = new App\Api_log();
//		$api_log2 = new App\Api_log();
//		  $rules = [
//			'name' => 'required',
//			'phone' => 'required|digits:10',
//
//			'age' => 'required',
//		];
//
//		$validator = Validator::make($request->all(),$rules);
//		if ($validator->fails()) {
//			return redirect('/thankyou')
//			->withInput()
//			->withErrors($validator);
//		}
//		else{
//           //$data = $request->input();
//			try{
//				 $name=$request->input('name');
//				$email=$request->input('email');
//				$phone = $request->input('phone');
//				$ign = $request->input('ign');
//				$otp = '';
//				$country = $request->input('country');
//				$state = $request->input('state');
//				$age = $request->input('age');
//				$match_date = $request->input('match_date');
//				$amount = $request->input('amount');
//
//                $register->name = $name;
//                $register->email =$email;
//				$register->phone = $phone;
//				$register->ign = $ign;
//				$register->otp = $otp;
//				$register->country = $country;
//				$register->state = $state;
//				$register->age = $age;
//				$register->match_date = $match_date;
//				$register->save();
//				$client_id=$register->id;
//				$order_id=date('YmdHis');
//
//
//		      $users = DB::table('mcg_register')->where('id',  $client_id)->first();
//			  $name=explode(' ',$users->name);
//			  $phone=$users->phone;
//			  $ign=$users->ign;
//			   $match_date=$users->match_date;
//			   $fail_flag=0;
//			  $tid=45501;
//                if(strtotime($match_date)==strtotime('2020-09-01'))
//                {
//                    $tid=45501;
//                }
//                else if(strtotime($match_date)==strtotime('2020-09-03'))
//                {
//                    $tid=45502;
//                }
//                else if(strtotime($match_date)==strtotime('2020-09-05'))
//                {
//                    $tid=45503;
//                }
//                else if(strtotime($match_date)==strtotime('2020-09-06'))
//                {
//                    $tid=45504;
//                }
//                else if(strtotime($match_date)==strtotime('2020-09-08'))
//                {
//                    $tid=45505;
//                }
//                else if(strtotime($match_date)==strtotime('2020-09-10'))
//                {
//                    $tid=45506;
//                }
//
//
//
//			/***************** validate ****************/
//				 $data1=array();
//				  $game=array();
//				  $game['freefire_username']= $ign;
//				  $data1['captain_mobile']=(int)$phone;
//				  $data1['captain_game_id']=$game;
//				  $payload1= json_encode($data1);
//				 // die;
//				 $curl = curl_init();
//
//					curl_setopt_array($curl, array(
//					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/validations/customer/".$tid,
//					  CURLOPT_RETURNTRANSFER => true,
//					  CURLOPT_ENCODING => "",
//					  CURLOPT_MAXREDIRS => 10,
//					  CURLOPT_TIMEOUT => 0,
//					  CURLOPT_FOLLOWLOCATION => true,
//					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					  CURLOPT_CUSTOMREQUEST => "POST",
//					  CURLOPT_POSTFIELDS =>$payload1,
//					  CURLOPT_HTTPHEADER => array(
//						"authorization: 659KuQY2EQPXeUlA",
//						"Content-Type: application/json",
//						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//					  ),
//					));
//
//					$response = curl_exec($curl);
//
//					curl_close($curl);
//					$data_response2=json_decode($response);
//
//					if($data_response2->statusCode==400){
//					$fail_flag=1;
//					}
//
//					//echo $response;
//
//					$api_log->client_id = $users->id;
//					$api_log->api_request = $payload1;
//					$api_log->api_response = $response;
//					$api_log->api_url = "https://adminapi.gamingmonk.com/player/validations/customer/".$tid;
//					$api_log->api_name = 'validation_api';
//					$api_log->save();
//					$flag=0;
//					$errorflag=0;
//					$mismatch=0;
//					$userblocked=0;
//					$invalidlength=0;
//
//					if(isset($data_response2->users[0]->userIGN->format))
//					{
//						$flag=1;
//					}
//					if(isset($data_response2->error))
//					{
//						$errorflag=1;
//					}
//					if(isset($data_response2->users[0]->userBlocked))
//					{
//						if($data_response2->users[0]->userBlocked==true)
//						{
//						$userblocked=1;
//						}
//					}
//					if(isset($data_response2->users[0]->userIGN->length))
//					{
//
//						$invalidlength=1;
//
//					}
//					if(isset($data_response2->users[0]->userIGN->mismatch))
//					{
//						if($data_response2->users[0]->userIGN->mismatch==true)
//						{
//							$mismatch=1;
//						}
//					}
//					/* echo $invalidlength;
//					print_r($data_response2);
//					die; */
//				if($data_response2->statusCode==200)
//				{
//					 //join tournament api
//						$data4=array();
//						$data4['captain_mobile']=(int)$phone;
//						 $payload4= json_encode($data4);
//						$curl = curl_init();
//
//						curl_setopt_array($curl, array(
//					  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
//					  CURLOPT_RETURNTRANSFER => true,
//					  CURLOPT_ENCODING => "",
//					  CURLOPT_MAXREDIRS => 10,
//					  CURLOPT_TIMEOUT => 0,
//					  CURLOPT_FOLLOWLOCATION => true,
//					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					  CURLOPT_CUSTOMREQUEST => "POST",
//					  CURLOPT_POSTFIELDS =>$payload4,
//					  CURLOPT_HTTPHEADER => array(
//						"authorization: 659KuQY2EQPXeUlA",
//						"Content-Type: application/json",
//						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//					  ),
//					));
//
//					$response3 = curl_exec($curl);
//
//					curl_close($curl);
//
//					$data_response=json_decode($response3);
//					if($data_response->statusCode==400){
//					$fail_flag=1;
//					}
//
//
//					$api_log2->client_id = $users->id;
//					$api_log2->api_request = $payload4;
//					$api_log2->api_response = $response3;
//					$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
//					$api_log2->api_name = 'customer_join_api';
//					$api_log2->save();
//
//                    $register->smsMod();
//
//					//message success
//					return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//				}
//				elseif($errorflag==1)
//				{
//					return '<script type="text/javascript">alert("Please Provide Valid Details.");window.location.href="/";</script>';
//				}
//				elseif($data_response2->statusCode==400 && $invalidlength==1)
//				{
//					return '<script type="text/javascript">alert("Please Provide Valid In Game Name.");window.location.href="/";</script>';
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userExists==false && $data_response2->users[0]->userIGN->valid==true)
//				{
//					$data2=array();
//					$data3=array();
//
//					  $data2['mobile']=(int)$phone;
//					  $data2['freefire_username']=$ign;
//					  $data3[0]=$data2;
//					  $payload2= json_encode($data3);
//
//						$curl = curl_init();
//
//					curl_setopt_array($curl, array(
//					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
//					  CURLOPT_RETURNTRANSFER => true,
//					  CURLOPT_ENCODING => "",
//					  CURLOPT_MAXREDIRS => 10,
//					  CURLOPT_TIMEOUT => 0,
//					  CURLOPT_FOLLOWLOCATION => true,
//					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					  CURLOPT_CUSTOMREQUEST => "POST",
//					  CURLOPT_POSTFIELDS =>$payload2,
//					  CURLOPT_HTTPHEADER => array(
//						"authorization: 659KuQY2EQPXeUlA",
//						"Content-Type: application/json",
//						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//					  ),
//					));
//
//					$response1 = curl_exec($curl);
//
//					curl_close($curl);
//					$data_response1=json_decode($response1);
//					//echo $data_response1->statusCode;
//					if($data_response1->statusCode==400){
//					$fail_flag=1;
//					}
//
//
//
//					$api_log1->client_id = $users->id;
//					$api_log1->api_request = $payload2;
//					$api_log1->api_response = $response1;
//					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
//					$api_log1->api_name = 'customer_create_api';
//					$api_log1->save();
//					if($data_response1->statusCode == 200)
//					{
//							//join tournament api
//							$data4=array();
//							$data4['captain_mobile']=(int)$phone;
//							 $payload4= json_encode($data4);
//							$curl = curl_init();
//
//							curl_setopt_array($curl, array(
//						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
//						  CURLOPT_RETURNTRANSFER => true,
//						  CURLOPT_ENCODING => "",
//						  CURLOPT_MAXREDIRS => 10,
//						  CURLOPT_TIMEOUT => 0,
//						  CURLOPT_FOLLOWLOCATION => true,
//						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//						  CURLOPT_CUSTOMREQUEST => "POST",
//						  CURLOPT_POSTFIELDS =>$payload4,
//						  CURLOPT_HTTPHEADER => array(
//							"authorization: 659KuQY2EQPXeUlA",
//							"Content-Type: application/json",
//							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//						  ),
//						));
//
//						$response3 = curl_exec($curl);
//
//						curl_close($curl);
//
//						$data_response=json_decode($response3);
//						if($data_response->statusCode==400){
//						$fail_flag=1;
//						}
//
//
//						$api_log2->client_id = $users->id;
//						$api_log2->api_request = $payload4;
//						$api_log2->api_response = $response3;
//						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
//						$api_log2->api_name = 'customer_join_api';
//						$api_log2->save();
//
//                        $register->smsMod();
//
//						//Message to inform user: He is registered for the tournament.
//						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//					}
//					else{
//						//   Message to inform user: He is not registered.
//						return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
//					}
//				}
//				elseif($data_response2->statusCode==400 && $userblocked==1)
//				{
//					// Message to inform user: He is blocked and cannot be registered.
//					return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
//
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userIGN->valid==false && $flag==1){
//
//
//					return '<script type="text/javascript">alert('.$data_response2->users[0]->userIGN->format.');window.location.href="/";</script>';
//
//
//				}
//				elseif($data_response2->statusCode==400 && $mismatch==1 && $data_response2->users[0]->userIGN->valid==false)
//				{
//					$data2=array();
//					$data3=array();
//
//					  $data2['mobile']=(int)$phone;
//					  $data2['freefire_username']=$ign;
//					  $data3[0]=$data2;
//					  $payload2= json_encode($data3);
//
//						$curl = curl_init();
//
//					curl_setopt_array($curl, array(
//					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
//					  CURLOPT_RETURNTRANSFER => true,
//					  CURLOPT_ENCODING => "",
//					  CURLOPT_MAXREDIRS => 10,
//					  CURLOPT_TIMEOUT => 0,
//					  CURLOPT_FOLLOWLOCATION => true,
//					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					  CURLOPT_CUSTOMREQUEST => "POST",
//					  CURLOPT_POSTFIELDS =>$payload2,
//					  CURLOPT_HTTPHEADER => array(
//						"authorization: 659KuQY2EQPXeUlA",
//						"Content-Type: application/json",
//						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//					  ),
//					));
//
//					$response1 = curl_exec($curl);
//
//					curl_close($curl);
//					$data_response1=json_decode($response1);
//					//echo $data_response1->statusCode;
//					if($data_response1->statusCode==400){
//					$fail_flag=1;
//					}
//
//
//
//					$api_log1->client_id = $users->id;
//					$api_log1->api_request = $payload2;
//					$api_log1->api_response = $response1;
//					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
//					$api_log1->api_name = 'customer_create_api';
//					$api_log1->save();
//					if($data_response1->statusCode == 200)
//					{
//							//join tournament api
//							$data4=array();
//							$data4['captain_mobile']=(int)$phone;
//							 $payload4= json_encode($data4);
//							$curl = curl_init();
//
//							curl_setopt_array($curl, array(
//						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
//						  CURLOPT_RETURNTRANSFER => true,
//						  CURLOPT_ENCODING => "",
//						  CURLOPT_MAXREDIRS => 10,
//						  CURLOPT_TIMEOUT => 0,
//						  CURLOPT_FOLLOWLOCATION => true,
//						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//						  CURLOPT_CUSTOMREQUEST => "POST",
//						  CURLOPT_POSTFIELDS =>$payload4,
//						  CURLOPT_HTTPHEADER => array(
//							"authorization: 659KuQY2EQPXeUlA",
//							"Content-Type: application/json",
//							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//						  ),
//						));
//
//						$response3 = curl_exec($curl);
//
//						curl_close($curl);
//
//						$data_response=json_decode($response3);
//						if($data_response->statusCode==400){
//						$fail_flag=1;
//						}
//
//
//						$api_log2->client_id = $users->id;
//						$api_log2->api_request = $payload4;
//						$api_log2->api_response = $response3;
//						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
//						$api_log2->api_name = 'customer_join_api';
//						$api_log2->save();
//
//                        $register->smsMod();
//
//						//Message to inform user: He is registered for the tournament.
//						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//					}
//					 else
//						{
//
//						   // Message to inform user: He is not registered.
//						   return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
//
//					}
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userIGN->valid == true  && $data_response2->users[0]->userIGNExists == false)
//				{
//
//					$data2=array();
//					$data3=array();
//
//					  $data2['mobile']=(int)$phone;
//					  $data2['freefire_username']=$ign;
//					  $data3[0]=$data2;
//					  $payload2= json_encode($data3);
//
//						$curl = curl_init();
//
//					curl_setopt_array($curl, array(
//					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
//					  CURLOPT_RETURNTRANSFER => true,
//					  CURLOPT_ENCODING => "",
//					  CURLOPT_MAXREDIRS => 10,
//					  CURLOPT_TIMEOUT => 0,
//					  CURLOPT_FOLLOWLOCATION => true,
//					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//					  CURLOPT_CUSTOMREQUEST => "POST",
//					  CURLOPT_POSTFIELDS =>$payload2,
//					  CURLOPT_HTTPHEADER => array(
//						"authorization: 659KuQY2EQPXeUlA",
//						"Content-Type: application/json",
//						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//					  ),
//					));
//
//					$response1 = curl_exec($curl);
//
//					curl_close($curl);
//					$data_response1=json_decode($response1);
//					//echo $data_response1->statusCode;
//					if($data_response1->statusCode==400){
//					$fail_flag=1;
//					}
//
//
//
//					$api_log1->client_id = $users->id;
//					$api_log1->api_request = $payload2;
//					$api_log1->api_response = $response1;
//					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
//					$api_log1->api_name = 'customer_create_api';
//					$api_log1->save();
//					if($data_response1->statusCode == 200)
//					{
//							//join tournament api
//							$data4=array();
//							$data4['captain_mobile']=(int)$phone;
//							 $payload4= json_encode($data4);
//							$curl = curl_init();
//
//							curl_setopt_array($curl, array(
//						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
//						  CURLOPT_RETURNTRANSFER => true,
//						  CURLOPT_ENCODING => "",
//						  CURLOPT_MAXREDIRS => 10,
//						  CURLOPT_TIMEOUT => 0,
//						  CURLOPT_FOLLOWLOCATION => true,
//						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//						  CURLOPT_CUSTOMREQUEST => "POST",
//						  CURLOPT_POSTFIELDS =>$payload4,
//						  CURLOPT_HTTPHEADER => array(
//							"authorization: 659KuQY2EQPXeUlA",
//							"Content-Type: application/json",
//							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
//						  ),
//						));
//
//						$response3 = curl_exec($curl);
//
//						curl_close($curl);
//
//						$data_response=json_decode($response3);
//						if($data_response->statusCode==400){
//						$fail_flag=1;
//						}
//
//
//						$api_log2->client_id = $users->id;
//						$api_log2->api_request = $payload4;
//						$api_log2->api_response = $response3;
//						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
//						$api_log2->api_name = 'customer_join_api';
//						$api_log2->save();
//
//                        $register->smsMod();
//
//						//Message to inform user: He is registered for the tournament.
//						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//					}
//					 else
//						{
//
//						   // Message to inform user: He is not registered.
//						return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
//					}
//
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userAlreadyJoined == true){
//					return '<script type="text/javascript">var r = confirm("You are already joined in by another ID. Do you want to update existing ID?");if (r == true) {window.location.href="/update/'.$phone.'/'.$ign.'/'.$tid.'";} else {alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";}</script>';
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userExists == true && $mismatch==1 && $data_response2->users[0]->userIGN->valid==false){
//					return '<script type="text/javascript">var r = confirm("You are already joined in by another ID. Do you want to update existing ID?");if (r == true) {window.location.href="/update/'.$phone.'/'.$ign.'/'.$tid.'";} else {alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";}</script>';
//				}
//				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userJoinedAnotherTournament == true )
//				{
//
//					 //Message to inform user: You have joined another tournament using this ID.
//					return '<script type="text/javascript">alert("You have joined another tournament using this ID..");window.location.href="/";</script>';
//				}
//				else
//				{
//					return '<script type="text/javascript">alert("Please Provide Valid Details.");window.location.href="/";</script>';
//				}
//
//
//
//
//
//
//				//Session::put('order_id',$order_id);
//				//transaction
//				/* $transaction->client_id = $client_id;
//                $transaction->order_id =$order_id;
//				$transaction->transaction_id = $order_id;
//				$transaction->amount = $amount;
//
//				$transaction->save(); */
//
//               // return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//
////                return redirect('/payumoney/'.$order_id)->with('order_id',$order_id);
//			}
//			catch(Exception $e){
//				return redirect('/thankyou')->with('failed',"Registration failed");
//			}
//		 }
//	}
/*****
	register Function
	*/ 
	public function register1(Request $request)
	{ 
		$register = new App\Mcg_register();
		$transaction = new App\Transaction_payu();
		$api_log = new App\Api_log();
		$api_log1 = new App\Api_log();
		$api_log2 = new App\Api_log();
		
		 $rules = [
			'name1' => 'required',
			'phone' => 'required|digits:10', 
			'age1' => 'required',
		];
		
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('/thankyou')
			->withInput()
			->withErrors($validator);
		}
		else{
           //$data = $request->input();
			try{ 
				$name=$request->input('name1');
				$email=$request->input('email1');
				$phone = $request->input('phone1');
				$ign = $request->input('ign1');
				$otp = '';
				$country = $request->input('country1');
				$state = $request->input('state1');
				$age = $request->input('age1');
				$match_date = $request->input('match_date1');
				$amount = $request->input('amount1');
				
                $register->name = $name;
                $register->email =$email;
				$register->phone = $phone;
				$register->ign = $ign;
				$register->otp = $otp;
				$register->country = $country;
				$register->state = $state;
				$register->age = $age;
				$register->match_date = $match_date;
				$register->save();  
				$client_id=$register->id;
				$order_id=date('YmdHis');
				//Session::put('order_id',$order_id);
				//transaction 
				$transaction->client_id = $client_id;
                $transaction->order_id =$order_id;
				$transaction->transaction_id = $order_id;
				$transaction->amount = $amount;
				
				$transaction->save();
				
				$users = DB::table('mcg_register')->where('id',  $client_id)->first();
				  $name=explode(' ',$users->name);
				  $phone=$users->phone;
				  $ign=$users->ign;
				   $match_date=$users->match_date;
				   $fail_flag=0;
				  $tid=45501;
                if(strtotime($match_date)==strtotime('2020-09-01'))
                {
                    $tid=45501;
                }
                else if(strtotime($match_date)==strtotime('2020-09-03'))
                {
                    $tid=45502;
                }
                else if(strtotime($match_date)==strtotime('2020-09-05'))
                {
                    $tid=45503;
                }
                else if(strtotime($match_date)==strtotime('2020-09-06'))
                {
                    $tid=45504;
                }
                else if(strtotime($match_date)==strtotime('2020-09-08'))
                {
                    $tid=45505;
                }
                else if(strtotime($match_date)==strtotime('2020-09-10'))
                {
                    $tid=45506;
                }
				
				 
				/***************** validate ****************/
				 $data1=array();
				  $game=array();
				  $game['freefire_username']= $ign;
				  $data1['captain_mobile']=(int)$phone;
				  $data1['captain_game_id']=$game;
				  $payload1= json_encode($data1);
				 // die;
				 $curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/validations/customer/".$tid,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload1,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					$data_response2=json_decode($response);
					
					if($data_response2->statusCode==400){ 
					$fail_flag=1;
					}
					
					//echo $response;
					
					$api_log->client_id = $users->id;
					$api_log->api_request = $payload1;
					$api_log->api_response = $response;
					$api_log->api_url = "https://adminapi.gamingmonk.com/player/validations/customer/".$tid;
					$api_log->api_name = 'validation_api';
					$api_log->save();
					$flag=0;
					$errorflag=0;
					$mismatch=0;
					$userblocked=0;
					$invalidlength=0;
					
					if(isset($data_response2->users[0]->userIGN->format))
					{
						$flag=1;
					}
					if(isset($data_response2->error))
					{
						$errorflag=1;
					}
					if(isset($data_response2->users[0]->userBlocked))   
					{
						if($data_response2->users[0]->userBlocked==true)
						{
						$userblocked=1;
						}
					}
					if(isset($data_response2->users[0]->userIGN->length))   
					{
						
						$invalidlength=1;
						
					}
					if(isset($data_response2->users[0]->userIGN->mismatch))
					{
						if($data_response2->users[0]->userIGN->mismatch==true)
						{
							$mismatch=1;
						}
					}
					/* echo $invalidlength;
					print_r($data_response2);
					die; */
				if($data_response2->statusCode==200)
				{
					 //join tournament api 
						$data4=array();
						$data4['captain_mobile']=(int)$phone;
						 $payload4= json_encode($data4);
						$curl = curl_init();

						curl_setopt_array($curl, array(
					  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload4,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response3 = curl_exec($curl);

					curl_close($curl);
					
					$data_response=json_decode($response3);
					if($data_response->statusCode==400){ 
					$fail_flag=1;
					}
					

					$api_log2->client_id = $users->id;
					$api_log2->api_request = $payload4;
					$api_log2->api_response = $response3;
					$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
					$api_log2->api_name = 'customer_join_api';
					$api_log2->save();
					//message success
					return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
				}
				elseif($errorflag==1)
				{
					return '<script type="text/javascript">alert("Please Provide Valid Details.");window.location.href="/";</script>';
				}
				elseif($data_response2->statusCode==400 && $invalidlength==1)
				{
					return '<script type="text/javascript">alert("Please Provide Valid In Game Name.");window.location.href="/";</script>';
				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userExists==false && $data_response2->users[0]->userIGN->valid==true) 
				{
					$data2=array();
					$data3=array();
					
					  $data2['mobile']=(int)$phone;
					  $data2['freefire_username']=$ign;
					  $data3[0]=$data2;
					  $payload2= json_encode($data3);
					  
						$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload2,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response1 = curl_exec($curl);

					curl_close($curl);
					$data_response1=json_decode($response1);
					//echo $data_response1->statusCode;
					if($data_response1->statusCode==400){ 
					$fail_flag=1;
					}
					
			

					$api_log1->client_id = $users->id;
					$api_log1->api_request = $payload2;
					$api_log1->api_response = $response1;
					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
					$api_log1->api_name = 'customer_create_api';
					$api_log1->save(); 
					if($data_response1->statusCode == 200)
					{
							//join tournament api 
							$data4=array();
							$data4['captain_mobile']=(int)$phone;
							 $payload4= json_encode($data4);
							$curl = curl_init();

							curl_setopt_array($curl, array(
						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>$payload4,
						  CURLOPT_HTTPHEADER => array(
							"authorization: 659KuQY2EQPXeUlA",
							"Content-Type: application/json",
							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
						  ),
						));

						$response3 = curl_exec($curl);

						curl_close($curl);
						
						$data_response=json_decode($response3);
						if($data_response->statusCode==400){ 
						$fail_flag=1;
						}
						

						$api_log2->client_id = $users->id;
						$api_log2->api_request = $payload4;
						$api_log2->api_response = $response3;
						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
						$api_log2->api_name = 'customer_join_api';
						$api_log2->save();
						//Message to inform user: He is registered for the tournament.
						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
					}
					else{
						//   Message to inform user: He is not registered.
						return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
					}
				}
				elseif($data_response2->statusCode==400 && $userblocked==1)  
				{
					// Message to inform user: He is blocked and cannot be registered.
					return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
					
				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userIGN->valid==false && $flag==1){
					
					
					return '<script type="text/javascript">alert('.$data_response2->users[0]->userIGN->format.');window.location.href="/";</script>';
					
					
				}
				elseif($data_response2->statusCode==400 && $mismatch==1 && $data_response2->users[0]->userIGN->valid==false)
				{
					$data2=array();
					$data3=array();
					
					  $data2['mobile']=(int)$phone;
					  $data2['freefire_username']=$ign;
					  $data3[0]=$data2;
					  $payload2= json_encode($data3);
					  
						$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload2,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response1 = curl_exec($curl);

					curl_close($curl);
					$data_response1=json_decode($response1);
					//echo $data_response1->statusCode;
					if($data_response1->statusCode==400){ 
					$fail_flag=1;
					}
					
			

					$api_log1->client_id = $users->id;
					$api_log1->api_request = $payload2;
					$api_log1->api_response = $response1;
					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
					$api_log1->api_name = 'customer_create_api';
					$api_log1->save();
					if($data_response1->statusCode == 200)
					{
							//join tournament api 
							$data4=array();
							$data4['captain_mobile']=(int)$phone;
							 $payload4= json_encode($data4);
							$curl = curl_init();

							curl_setopt_array($curl, array(
						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>$payload4,
						  CURLOPT_HTTPHEADER => array(
							"authorization: 659KuQY2EQPXeUlA",
							"Content-Type: application/json",
							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
						  ),
						));

						$response3 = curl_exec($curl);

						curl_close($curl);
						
						$data_response=json_decode($response3);
						if($data_response->statusCode==400){ 
						$fail_flag=1;
						}
						

						$api_log2->client_id = $users->id;
						$api_log2->api_request = $payload4;
						$api_log2->api_response = $response3;
						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
						$api_log2->api_name = 'customer_join_api';
						$api_log2->save();
						//Message to inform user: He is registered for the tournament.
						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
					}
					 else
						{

						   // Message to inform user: He is not registered.
						   return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';

					}
				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userIGN->valid == true  && $data_response2->users[0]->userIGNExists == false)
				{

					$data2=array();
					$data3=array();
					
					  $data2['mobile']=(int)$phone;
					  $data2['freefire_username']=$ign;
					  $data3[0]=$data2;
					  $payload2= json_encode($data3);
					  
						$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload2,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response1 = curl_exec($curl);

					curl_close($curl);
					$data_response1=json_decode($response1);
					//echo $data_response1->statusCode;
					if($data_response1->statusCode==400){ 
					$fail_flag=1;
					}
					
			

					$api_log1->client_id = $users->id;
					$api_log1->api_request = $payload2;
					$api_log1->api_response = $response1;
					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
					$api_log1->api_name = 'customer_create_api';
					$api_log1->save();
					if($data_response1->statusCode == 200)
					{
							//join tournament api 
							$data4=array();
							$data4['captain_mobile']=(int)$phone;
							 $payload4= json_encode($data4);
							$curl = curl_init();

							curl_setopt_array($curl, array(
						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>$payload4,
						  CURLOPT_HTTPHEADER => array(
							"authorization: 659KuQY2EQPXeUlA",
							"Content-Type: application/json",
							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
						  ),
						));

						$response3 = curl_exec($curl);

						curl_close($curl);
						
						$data_response=json_decode($response3);
						if($data_response->statusCode==400){ 
						$fail_flag=1;
						}
						

						$api_log2->client_id = $users->id;
						$api_log2->api_request = $payload4;
						$api_log2->api_response = $response3;
						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
						$api_log2->api_name = 'customer_join_api';
						$api_log2->save();
						//Message to inform user: He is registered for the tournament.
						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
					}
					 else
						{

						   // Message to inform user: He is not registered.
						return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/";</script>';
					}

				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userAlreadyJoined == true){
					return '<script type="text/javascript">var r = confirm("You are already joined in by another ID. Do you want to update existing ID?");if (r == true) {window.location.href="/update/'.$phone.'/'.$ign.'/'.$tid.'";} else {alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";}</script>'; 
				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userExists == true && $mismatch==1 && $data_response2->users[0]->userIGN->valid==false){
					return '<script type="text/javascript">var r = confirm("You are already joined in by another ID. Do you want to update existing ID?");if (r == true) {window.location.href="/update/'.$phone.'/'.$ign.'/'.$tid.'";} else {alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";}</script>'; 
				}
				elseif($data_response2->statusCode==400 && $data_response2->users[0]->userJoinedAnotherTournament == true )
				{

					 //Message to inform user: You have joined another tournament using this ID.
					return '<script type="text/javascript">alert("You have joined another tournament using this ID..");window.location.href="/";</script>';
				}
				else
				{
					return '<script type="text/javascript">alert("Please Provide Valid Details.");window.location.href="/";</script>';
				}
				
			
               // return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
//				 return redirect('/payumoney/'.$order_id)->with('order_id',$order_id);
			}
			catch(Exception $e){
				return redirect('/thankyou')->with('failed',"Registration failed");
			}
		 } 
	}
	
	/***
	update api
	*/
	public function update_api($phone,$ign,$tid)
	{
					$api_log = new App\Api_log();
					$api_log1 = new App\Api_log();
					$api_log2 = new App\Api_log(); 
					$users = DB::table('mcg_register')->where('phone', $phone)->first();
					$data2=array();
					$data3=array();
					
					  $data2['mobile']=(int)$phone;
					  $data2['freefire_username']=$ign;
					  $data3[0]=$data2;
					  $payload2= json_encode($data3);
					  
						$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://adminapi.gamingmonk.com/player/create/profile/customer",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS =>$payload2,
					  CURLOPT_HTTPHEADER => array(
						"authorization: 659KuQY2EQPXeUlA",
						"Content-Type: application/json",
						"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
					  ),
					));

					$response1 = curl_exec($curl);

					curl_close($curl);
					$data_response1=json_decode($response1);
					//echo $data_response1->statusCode;
					if($data_response1->statusCode==400){ 
					$fail_flag=1;
					}
					
			

					$api_log1->client_id = $users->id;
					$api_log1->api_request = $payload2;
					$api_log1->api_response = $response1;
					$api_log1->api_url = "https://adminapi.gamingmonk.com/player/create/profile/customer";
					$api_log1->api_name = 'customer_create_api';
					$api_log1->save();
					if($data_response1->statusCode == 200)
					{
							//join tournament api 
							$data4=array();
							$data4['captain_mobile']=(int)$phone;
							 $payload4= json_encode($data4);
							$curl = curl_init();

							curl_setopt_array($curl, array(
						  CURLOPT_URL =>  "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid,
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 0,
						  CURLOPT_FOLLOWLOCATION => true,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "POST",
						  CURLOPT_POSTFIELDS =>$payload4,
						  CURLOPT_HTTPHEADER => array(
							"authorization: 659KuQY2EQPXeUlA",
							"Content-Type: application/json",
							"Cookie: __cfduid=d4366fd71937f820edc5151f481d0d9e01597934974"
						  ),
						));

						$response3 = curl_exec($curl);

						curl_close($curl);
						
						$data_response=json_decode($response3);
						if($data_response->statusCode==400){ 
						$fail_flag=1;
						}
						

						$api_log2->client_id = $users->id;
						$api_log2->api_request = $payload4;
						$api_log2->api_response = $response3;
						$api_log2->api_url = "https://adminapi.gamingmonk.com/tournament/join/customer/".$tid;
						$api_log2->api_name = 'customer_join_api';
						$api_log2->save();
						//Message to inform user: He is registered for the tournament.
						return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
					}
					 else
						{

						   // Message to inform user: He is not registered.
						return '<script type="text/javascript">alert("Your registration failed.");window.location.href="/thankyou";</script>';
					}
	}
}
