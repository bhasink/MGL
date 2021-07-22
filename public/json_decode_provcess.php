<?php 


					$response =' [
 {
    "statusCode":400,
    "error":"Bad Request",
    "errorCode":40,
    "message":400
 }
]';
				
					$data_response2=json_decode($response);
					print_r($data_response2);
if(isset($data_response2[0]->error))
{	
					echo $data_response2[0]->error; 
}
					
  ?>