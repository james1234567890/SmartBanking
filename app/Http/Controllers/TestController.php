<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,
    Redirect,
    Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;

class TestController extends Controller {

     public function showSendSMS(){
        return view('send_sms');
    } 
    
    function postSendSMS(Request $request){
        $response=$this->SendSMS($request->phoneno,$request->message);
        return response()->json($response);
        
    }
    function SendSMS($phoneno,$message) {
        $url = 'https://mysms.celcomafrica.com/api/services/sendsms/';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'partnerID' => '1882',
            'apikey' => 'be976cf51cf1d01d20928df1339b1f93',
            'mobile' => $phoneno,
            'message' => $message,
            'shortcode' => 'BOOST_SACCO',
            'pass_type' => 'plain', //bm5 {base64 encode} or plain
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        return $curl_response;
        //print_r($curl_response);
    }

}

?>