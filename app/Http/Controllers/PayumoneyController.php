<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Softon\Indipay\Facades\Indipay;
use App;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class PayumoneyController extends Controller
{
    //
	public function payumoneyPayment($id)
	{
		$transaction = new App\Transaction_payu();
		  $order_id = $id;
		 $transaction_Details = DB::table('transaction_payu')->where('order_id',  $order_id)->first();
		  
		  $users = DB::table('mcg_register')->where('id',  $transaction_Details->client_id)->first();
		  $name=explode(' ',$users->name);
		  if(!isset($name[1]))
		  {
			  $name[1]=$name[0];
		  }
		 $amount=$transaction_Details->amount;
		 $email=$users->email; 
		 if($email=='')
		 {
			 $email="test@gmail.com"; 
		 }
		 $parameters = [
			'txnid' => $order_id,
			'order_id' => $order_id,
			'amount' => $amount,
			'firstname' => $name[0],
			'lastname' => $name[1],
			'email' => $email,
			'phone' => $users->phone,
			'productinfo' => $order_id,
			'service_provider' => '',
			'zipcode' => '721101',
			'city' => 'kolkata',
			'state' => $users->state,
			'country' => 'India',
			'address1' => 'kolkata',
			'address2' => 'kolkata',
			'curl' => url('payumoney/response'),
			
      ];
	  
	  // $order = Indipay::gateway('PayUMoney')->prepare($parameters);
	   $order = Indipay::prepare($parameters);
	  
    return Indipay::process($order);
	}
	
	 public function payumoneyResponse(Request $request)
    
    {
		$api_log = new App\Api_log();
		$api_log1 = new App\Api_log();
		$api_log2 = new App\Api_log();
        // For default Gateway
        $payuresponse = Indipay::response($request);
		
		
        if($payuresponse['status']=='success' && $payuresponse['unmappedstatus']=='captured')
		{
			
			
			$transaction_Details = DB::table('transaction_payu')->where('transaction_id',  $payuresponse['txnid'])->first();
		  
			  $users = DB::table('mcg_register')->where('id',  $transaction_Details->client_id)->first();
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
				/*****************	curl api create profile *****************/
			/* if($fail_flag!=1)
			{ */
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
			/* } */
			/*******	join api ******************/
			/* if($fail_flag!=1)
			{ */
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
			/* } */
			
			$update_transaction=DB::update('update transaction_payu set status = ?,reason=?,bank_ref_num=?,msg=? where transaction_id = ?',[$payuresponse['status'],$payuresponse['field9'],$payuresponse['bank_ref_num'],$payuresponse['error_Message'],$payuresponse['txnid']]);
			//return redirect('/')->with('msg',"Thank You For Registration.Your Payment Successfull");
			/* if($fail_flag==1)
			{
			return '<script type="text/javascript">alert("Sorry! your registration is not successful and your entry fee would be refunded within 7-10 business days. Kindly try registering tomorrow with a valid FreeFire In-game Name and the mobile number");window.location.href="/";</script>';
			}
			else{ */
				return '<script type="text/javascript">alert("Your registration is successful. You will receive an SMS regarding your game details before the start of your game. In-case you do not receive the same please contact us on queries@microgravity.co.in");window.location.href="/thankyou";</script>';
			/* } */
		}
		else{
			$transaction_Details = DB::table('transaction_payu')->where('transaction_id',  $payuresponse['txnid'])->first();
		  
			  $users = DB::table('mcg_register')->where('id',  $transaction_Details->client_id)->first();
			  $name=explode(' ',$users->name);
			  $phone=$users->phone;
			  $ign=$users->ign;
			 $match_date=$users->match_date;
			   $tid=45097; 
			$fail_flag=0;			
			
				
			$update_transaction=DB::update('update transaction_payu set status = ?,reason=?,bank_ref_num=?,msg=? where transaction_id = ?',[$payuresponse['status'],$payuresponse['field9'],$payuresponse['bank_ref_num'],$payuresponse['error_Message'],$payuresponse['txnid']]);
			//return redirect('/')->with('failed',"Thank You For Registration. Your Payment Failed");
			
			return '<script type="text/javascript">alert("Sorry your payment has failed please try registering again");window.location.href="/thankyou";</script>';
		}
        // For Otherthan Default Gateway
       /*  $response = Indipay::gateway('NameOfGatewayUsedDuringRequest')->response($request);

        dd($response); */
    
    }  
}
