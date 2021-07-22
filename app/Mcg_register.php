<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;


class Mcg_register extends Model {

	//
	protected $table = 'mcg_register';
	public $timestamps = false;


    public function smsMod()
    {

        $messagepn=  "Thanks for registering for the MICROGRAVITY GAMING LEAGUE! Gameplay details will be sent to you on your chosen date by 12PM. Game On!";

        $client = new Client;

        $sms_api = "http://alerts.digimiles.in/sendsms/bulksms?username=di80-youth&password=digimile&type=0&dlr=1&destination=$this->phone&source=YTBEAT&message=$messagepn";

        $sms_apii= $request = $client->request( 'GET',$sms_api );

        $sms_apii->getStatusCode();

        return $sms_apii;

    }
}
