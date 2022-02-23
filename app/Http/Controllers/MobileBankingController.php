<?php

namespace App\Http\Controllers;

use App\Navision\NTLMSoapClient;
use Illuminate\Http\Request;
use Validator,
    Redirect,
    Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use Storage;
use Carbon\Carbon;
use Config;

class MobileBankingController extends Controller {

    function showAddUser() {
        return view('mobile_banking_add_user');
    }

    function showUsers() {
        $mobilebankinguser = DB::select('select * from mobile_banking_user');
        return view('mobile_banking_users', ['mobilebankingusers' => $mobilebankinguser]);
    }

    function showWithdrawal() {
        $mobilebankingwithdrawal = DB::select('select * from mobile_banking_withdrawal');
        return view('mobile_banking_withdrawal', ['mobilebankingwithdrawals' => $mobilebankingwithdrawal]);
    }

    function showDeposit() {
        $mobilebankingdeposit = DB::select('select * from mobile_banking_deposit');
        return view('mobile_banking_deposit', ['mobilebankingdeposits' => $mobilebankingdeposit]);
    }

    function showFundTransfer() {
        $mobilebankingfundtransfer = DB::select('select * from mobile_banking_fund_transfer');
        return view('mobile_banking_fund_transfer', ['mobilebankingfundtransfers' => $mobilebankingfundtransfer]);
    }

    function showAccountBalance() {
        $mobilebankingaccountbalance = DB::select('select * from mobile_banking_account_balance');
        return view('mobile_banking_account_balance', ['mobilebankingaccountbalances' => $mobilebankingaccountbalance]);
    }

    function showMinistatement() {
        $mobilebankingministatement = DB::select('select * from mobile_banking_ministatement');
        return view('mobile_banking_ministatement', ['mobilebankingministatements' => $mobilebankingministatement]);
    }

    function showUtilityServices() {
        $mobilebankingutilityservice = DB::select('select * from mobile_banking_utility_services');
        return view('mobile_banking_utility_services', ['mobilebankingutilityservices' => $mobilebankingutilityservice]);
    }

    function showReferFriend() {
        $mobilebankingreferfriend = DB::select('select * from mobile_banking_refer_friend');
        return view('mobile_banking_refer_friend', ['mobilebankingreferfriends' => $mobilebankingreferfriend]);
    }

    function generatePIN($length) {
        //$input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input = '0123456789';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    function generateRequestID($length) {
        //$input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return "RQ-" . $random_string;
    }

    function generateAccessToken() {
        $consumer_key = "tv9TihJy62ADD1u9hGiCGGO04AWWp1FO";
        $consumer_secret = "qbpBAFaNLEmEO0aG";
        $credentials = base64_encode($consumer_key . ":" . $consumer_secret);

        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials));
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $curl_response = curl_exec($curl);
        $access_token = json_decode($curl_response);
        return $access_token->access_token;
    }

    function postWithdrawal(Request $request) {
        $response = $this->mpesaB2C($request->shortcode, "254708374149", $request->amount, $request->remarks);
        $this->storeWithdrawal($request, $response);
        $responsemesage = $this->getMpesaB2CCallBack($response);
        return $responsemesage;
    }

    function mpesaB2C($shortcode, $phoneno, $amount, $remarks) {
        //file_put_contents("withdrawal6.txt", $shortcode.$phoneno.$amount.$remarks);
        $url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'InitiatorName' => 'apiop37',
            'SecurityCredential' => 'XtMGMZKnUTC7mM53x4MYDwJWD0Lnix1VXg2dhzOwW9T0o52EzTpJlZB1c0duw1GK2s476yvf55txX9wkPq2MtNvLBF1pjDVcx9M0D+gPaVJMHgtR37v8n990nnw4YydqYBmpNxYohcdzx+P2i9y21b9j19lGSTDSQUL4/hAUHA6rTHBDRf3RXRd647RVchpI2NuSbqOU21/pDXv8emyaVMM1GMq1C3e2gNDabhSw8s856nxZlXwCESTZ+SqQLNyZs3Yr05yjgqm8Dm2yvy3y2+FrZrYd0FOZArIgHl9PeuEAnSDgwRMSiqPYOAgU2t4xzv2NiCY56fjpH6iD9eUSMw==',
            'CommandID' => 'SalaryPayment',
            'Amount' => $amount,
            'PartyA' => $shortcode,
            'PartyB' => $phoneno,
            'Remarks' => $remarks,
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL') . '/smartbanking/public/mobile_banking_b2c_callback',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL') . '/smartbanking/public/mobile_banking_b2c_callback',
            'Occasion' => 'PESL'
        );
        //SalaryPayment, BusinessPayment, PromotionPayment
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function storeWithdrawal($request, $response) {

        $shortcode = $request->shortcode;
        $channeltype = $request->channeltype;
        $accountno = $request->accountno;
        $accountname = $request->accountname;
        $phoneowner = $request->phonenoowner;
        $phoneno = $request->phoneno;
        $amount = $request->amount;
        $disbursalmode = $request->disbursalmode;
        $remarks = $request->remarks;
        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();
        $originatorconversationid = $response->OriginatorConversationID;
        $insertstatus = DB::insert('insert into mobile_banking_withdrawal(request_id,short_code,channel_type,account_no,account_name,phone_owner,phone_no,amount,disbursal_mode,transaction_date,transaction_time,remarks,originator_conversation_id)
                             values(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        [$requestid, $shortcode, $channeltype, $accountno, $accountname, $phoneowner, $phoneno, $amount, $disbursalmode, $requestdate, $requesttime, $remarks, $originatorconversationid]);
        if ($insertstatus) {
            
        }
    }

    function postMpesaB2CCallBack() {
        $response = json_decode(request()->getContent());

        $resultcode = $response->Result->ResultCode;
        $resultdesc = $response->Result->ResultDesc;
        $originatorconversationid = $response->Result->OriginatorConversationID;
        $conversationid = $response->Result->ConversationID;
        $transactionid = $response->Result->TransactionID;
        $ocidexist = DB::select('select originator_conversation_id from mobile_banking_withdrawal where originator_conversation_id=?', [$originatorconversationid]);

        if ($ocidexist) {
            $updatestatus = DB::update('update mobile_banking_withdrawal set

                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '"
                    where originator_conversation_id=?', [$originatorconversationid]);
        }
        if ($updatestatus) {
            $b2cwithdrawal = DB::select('select * from mobile_banking_withdrawal where originator_conversation_id=?', [$originatorconversationid]);
            $requestid = $b2cwithdrawal[0]->request_id;
            $accountno = $b2cwithdrawal[0]->account_no;
            $phoneno = $b2cwithdrawal[0]->phone_no;
            $amount = $b2cwithdrawal[0]->amount;
            $response = $this->MainBanking("1000", $requestid, $accountno, $phoneno, $amount, "");
            if ($response[0] == "00") {
                $date = Carbon::now();
                $posted = true;
                $posteddate = $date->toDateString();
                $postedtime = $date->toTimeString();
                $updatestatus2 = DB::update('update mobile_banking_withdrawal set
                    posted="' . $posted . '",
                    posted_date="' . $posteddate . '",
                    posted_time="' . $postedtime . '",
                    response_code="' . $response[0] . '",
                    response_message="' . $response[1] . '"
                    where originator_conversation_id=?', [$originatorconversationid]);
            }
        }
    }

    function getMpesaB2CCallBack($response) {
        sleep(8);
        $originatorconversationid = $response->OriginatorConversationID;
        $b2cwithdrawal = DB::select('select * from mobile_banking_withdrawal where originator_conversation_id=?', [$originatorconversationid]);
        $responsecode = $b2cwithdrawal[0]->response_code;
        if ($responsecode == "00") {
            return "Success";
        } else {
            return "Fail";
        }
    }

    function postUtilityServices(Request $request) {

        $response = $this->mpesaB2B($request->sendershortcode, $request->amount, $request->referenceno, $request->receivershortcode);
        $this->storeUtilityServices($request, $response);
        $responsemesage = $this->getMpesaB2BCallBack($response);
        return $responsemesage;
    }

    function mpesaB2B($sendershortcode, $amount, $accountref, $receivershortcode) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/b2b/v1/paymentrequest';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'Initiator' => 'apiop37',
            'SecurityCredential' => 'XtMGMZKnUTC7mM53x4MYDwJWD0Lnix1VXg2dhzOwW9T0o52EzTpJlZB1c0duw1GK2s476yvf55txX9wkPq2MtNvLBF1pjDVcx9M0D+gPaVJMHgtR37v8n990nnw4YydqYBmpNxYohcdzx+P2i9y21b9j19lGSTDSQUL4/hAUHA6rTHBDRf3RXRd647RVchpI2NuSbqOU21/pDXv8emyaVMM1GMq1C3e2gNDabhSw8s856nxZlXwCESTZ+SqQLNyZs3Yr05yjgqm8Dm2yvy3y2+FrZrYd0FOZArIgHl9PeuEAnSDgwRMSiqPYOAgU2t4xzv2NiCY56fjpH6iD9eUSMw==',
            'CommandID' => 'BusinessPayBill',
            'SenderIdentifierType' => '4',
            'RecieverIdentifierType' => '4',
            'Amount' => $amount,
            'PartyA' => $sendershortcode,
            'PartyB' => $receivershortcode,
            'AccountReference' => $accountref,
            'Remarks' => 'TEST',
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL') . '/smartbanking/public/mobile_banking_b2b_callback',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL') . '/smartbanking/public/mobile_banking_b2b_callback',
        );
        //BusinessPayBill, MerchantToMerchantTransfer, MerchantTransferFromMerchantToWorking, MerchantServicesMMFAccountTransfer, AgencyFloatAdvance
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function storeUtilityServices($request, $response) {
        $sendershortcode = $request->sendershortcode;
        $receivershortcode = $request->receivershortcode;
        $channeltype = $request->channeltype;
        $accountno = $request->accountno;
        $accountname = $request->accountname;
        $utilitytype = $request->utilitytype;
        $referenceno = $request->referenceno;
        $amount = $request->amount;
        $remarks = $request->remarks;
        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();
        $originatorconversationid = $response->OriginatorConversationID;
        $insertstatus = DB::insert('insert into mobile_banking_utility_services(request_id,sender_shortcode,channel_type,account_no,account_name,utility_type,reference_no,amount,receiver_shortcode,transaction_date,transaction_time,remarks,originator_conversation_id)
                             values(?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        [$requestid, $sendershortcode, $channeltype, $accountno, $accountname, $utilitytype, $referenceno, $amount, $receivershortcode, $requestdate, $requesttime, $remarks, $originatorconversationid]);
        if ($insertstatus) {
            
        }
    }

    function postMpesaB2BCallBack() {
        $response = json_decode(request()->getContent());

        $resultcode = $response->Result->ResultCode;
        $resultdesc = $response->Result->ResultDesc;
        $originatorconversationid = $response->Result->OriginatorConversationID;
        $conversationid = $response->Result->ConversationID;
        $transactionid = $response->Result->TransactionID;
        $ocidexist = DB::select('select originator_conversation_id from mobile_banking_utility_services where originator_conversation_id=?', [$originatorconversationid]);

        if ($ocidexist) {
            $updatestatus = DB::update('update mobile_banking_utility_services set

                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '"
                    where originator_conversation_id=?', [$originatorconversationid]);
        }
        if ($updatestatus) {
            $b2butilityservices = DB::select('select * from mobile_banking_utility_services where originator_conversation_id=?', [$originatorconversationid]);
            $requestid = $b2butilityservices[0]->request_id;
            $accountno = $b2butilityservices[0]->account_no;
            $phoneno = $b2butilityservices[0]->phone_no;
            $amount = $b2butilityservices[0]->amount;
            $response = $this->MainBanking("1000", $requestid, $accountno, $phoneno, $amount, "");
            if ($response[0] == "00") {
                $date = Carbon::now();
                $posted = true;
                $posteddate = $date->toDateString();
                $postedtime = $date->toTimeString();
                $updatestatus2 = DB::update('update mobile_banking_utility_services set
                    posted="' . $posted . '",
                    posted_date="' . $posteddate . '",
                    posted_time="' . $postedtime . '",
                    response_code="' . $response[0] . '",
                    response_message="' . $response[1] . '"
                    where originator_conversation_id=?', [$originatorconversationid]);
            }
        }
    }

    function getMpesaB2BCallBack($response) {
        sleep(8);
        $originatorconversationid = $response->OriginatorConversationID;
        $b2butilityservices = DB::select('select * from mobile_banking_withdrawal where originator_conversation_id=?', [$originatorconversationid]);
        $responsecode = $b2butilityservices[0]->response_code;
        if ($responsecode == "00") {
            return "Success";
        } else {
            return "Fail";
        }
    }

    function postAddUser(Request $request) {
        $memberno = $request->memberno;
        $membername = $request->membername;
        $accountno = $request->accountno;
        $accountname = $request->accountname;
        $phoneno = $request->phoneno;
        $alertoption = $request->alertoption;
        $active = true;
        $pinno = $this->generatePIN(4);
        $encryptedpinno = $this->encryptPIN($pinno);
        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();
        $insertstatus = DB::insert('insert into mobile_banking_user(request_id,member_no,member_name,account_no,account_name,phone_no,alert_option,active,pin_no,transaction_date,transaction_time)
                             values(?,?,?,?,?,?,?,?,?,?,?)',
                        [$requestid, $memberno, $membername, $accountno, $accountname, $phoneno, $alertoption, $active, $encryptedpinno, $requestdate, $requesttime]);
        if ($insertstatus) {
            
        }
    }

    function encryptPIN($pinno) {
        $soapsalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
        $soapsalt = substr(hash('sha256', $soapsalt, true), 0, 32);
        $method = 'aes-256-cbc';
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $encryptedpinno = base64_encode(openssl_encrypt($pinno, $method, $soapsalt, OPENSSL_RAW_DATA, $iv));
        return $encryptedpinno;
    }

    function decryptPIN($encryptedpinno) {
        $soapsalt = '20adeb83e85f03cfc84d0fb7e5f4d290';
        $soapsalt = substr(hash('sha256', $soapsalt, true), 0, 32);
        $method = 'aes-256-cbc';
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $decryptedpinno = openssl_decrypt(base64_decode($encryptedpinno), $method, $soapsalt, OPENSSL_RAW_DATA, $iv);
        return $decryptedpinno;
    }

    function postLogin(Request $request) {
        $pinno = $request->pinno;
        $encryptedpinno = $this->encryptPIN($pinno);
        $memberinfo = DB::select('select * from mobile_banking_user where pin_no=?', [$encryptedpinno]);
        if ($memberinfo) {
            $this->updateLastLogin($encryptedpinno);
            $memberinfojson = json_encode($memberinfo);
            return $memberinfojson;
        } else {
            return "Fail";
        }
    }

    function updateLastLogin($encryptedpinno) {
        $date = Carbon::now();
        $logindate = $date->toDateString();
        $logintime = $date->toTimeString();
        DB::update('update mobile_banking_user set
                    last_login_date="' . $logindate . '",
                    last_login_time="' . $logintime . '"              
                    where pin_no=?', [$encryptedpinno]);
    }

    function connectNAV() {
        ini_set("soap.wsdl_cache_enabled", "0");
        $wsdlUrl = 'http://192.168.1.3:8047/KBS150/WS/Kinangop%20Boost%20Sacco/Codeunit/MobileBanking';
        $options = [
            'ntlm_username' => 'DESKTOP-1QIA24B\JAMES',
            'ntlm_password' => '0000'
        ];
        $soapClient = new NTLMSoapClient($wsdlUrl, $options, $logger = null);
        return $soapClient;
    }

    function MainBanking($serviceid, $requestid, $draccountno, $phoneno, $amount, $craccountno) {

        $soapClient = $this->connectNAV();

        $parameters = [
            'serviceID' => $serviceid,
            'requestID' => $requestid,
            'phoneNo' => $phoneno,
            'debitAccountNo' => $draccountno,
            'transactionAmount' => $amount,
            'creditAccountNo' => $craccountno,
            'responseCode' => "",
            'responseMessage' => ""
        ];
        try {

            $response = $soapClient->MainBanking($parameters);
            $responsecode = $response->responseCode;
            $jsonresponsemessage = $response->responseMessage;

            $responsearr = Array($responsecode, $jsonresponsemessage);
            return $responsearr;
        } catch (SoapFault $soapFault) {
            file_put_contents("soapfault.txt", print_r($soapFault, true));
        }
    }

    function getAllMembers() {

        $soapClient = $this->connectNAV();
        //file_put_contents("mysoapfunctions.txt",$soapClient->__getFunctions());
        $parameters = [
            "trace" => true,
            "exceptions" => true,
            "membersJSON" => ""
        ];
        try {
            $response = $soapClient->GetAllMembers($parameters);
            $jsonMembers = $response->membersJSON;
            $data = json_decode($jsonMembers, true);
            return $data;
        } catch (SoapFault $soapFault) {
            file_put_contents("soapfault.txt", print_r($soapFault, true));
        }
    }

    function getMemberInfo($phoneno) {
        $soapClient = $this->connectNAV();
        $parameters = [
            "trace" => true,
            "exceptions" => true,
            'phoneNo' => $phoneno,
            'memberInfoJSON' => ""
        ];
        try {
            $response = $soapClient->GetMemberInfo($parameters);
            $jsonMemberInfo = $response->memberInfoJSON;
            $data = json_decode($jsonMemberInfo, true);
            return $data;
        } catch (SoapFault $soapFault) {
            file_put_contents("soapfault.txt", print_r($soapFault, true));
        }
    }

    function getSavingAccounts(Request $request) {
        $soapClient = $this->connectNAV();
        $parameters = [
            'phoneNo' => $request->phoneno,
            'savingAccountsJSON' => ""
        ];

        try {

            $response = $soapClient->GetSavingAccounts($parameters);
            $jsonSA = $response->savingAccountsJSON;
            $data = json_decode($jsonSA, true);
            return $data;
        } catch (SoapFault $soapFault) {
            $response = 'END No Accounts Found';
        }
    }

    function getLoanAccounts(Request $request) {
        $soapClient = $this->connectNAV();
        $parameters = [
            'phoneNo' => $request->phoneno,
            'loanAccountsJSON' => ""
        ];

        try {
            $response = $soapClient->GetLoanAccounts($parameters);
            $jsonLA = $response->loanAccountsJSON;
            $data = json_decode($jsonLA, true);
            return $data;
        } catch (SoapFault $soapFault) {
            var_dump($soapFault);
        }
    }

    function postFundTransfer(Request $request) {

        $channeltype = $request->channeltype;
        $sourceaccountno = $request->sourceaccountno;
        $sourceaccountname = $request->sourceaccountname;
        $destaccountowner = $request->destaccountowner;
        $destaccounttype = $request->destaccounttype;
        $destaccountno = $request->destaccountno;
        $destaccountname = $request->destaccountname;
        $phoneno = $request->phoneno;
        $amount = $request->amount;

        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();
        $response = "";
        $insertstatus = DB::insert('insert into mobile_banking_fund_transfer(request_id,channel_type,source_account_no,source_account_name,destination_account_owner,destination_account_type,destination_account_no,destination_account_name,phone_no,amount,transaction_date,transaction_time)
                             values(?,?,?,?,?,?,?,?,?,?,?,?)',
                        [$requestid, $channeltype, $sourceaccountno, $sourceaccountname, $destaccountowner, $destaccounttype, $destaccountno, $destaccountname, $phoneno, $amount, $requestdate, $requesttime]);
        if ($insertstatus) {
            if ($destaccounttype == "To Savings") {
                $response = $this->MainBanking("6000", $requestid, $sourceaccountno, $phoneno, $amount, $destaccountno);
            } else {
                $response = $this->MainBanking("6001", $requestid, $sourceaccountno, $phoneno, $amount, $destaccountno);
            }

            if ($response[0] == "00") {
                $date = Carbon::now();
                $posted = true;
                $posteddate = $date->toDateString();
                $postedtime = $date->toTimeString();
                $updatestatus = DB::update('update mobile_banking_fund_transfer set
                    posted="' . $posted . '",
                    posted_date="' . $posteddate . '",
                    posted_time="' . $postedtime . '",
                    response_code="' . $response[0] . '",
                    response_desc="' . $response[1] . '"
                    where request_id=?', [$requestid]);
            }
            sleep(6);
            if ($updatestatus) {
                return "Success";
            }
            return "Fail";
        } else {
            return "Fail";
        }
    }

    function postAccountBalance(Request $request) {
        $channeltype = $request->channeltype;
        $accounttype = $request->accounttype;
        $accountno = $request->accountno;
        $accountname = $request->accountname;
        $phoneno = $request->phoneno;

        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();

        $insertstatus = DB::insert('insert into mobile_banking_account_balance(request_id,channel_type,account_type,account_no,account_name,phone_no,transaction_date,transaction_time)
                             values(?,?,?,?,?,?,?,?)',
                        [$requestid, $channeltype, $accounttype, $accountno, $accountname, $phoneno, $requestdate, $requesttime]);
        if ($insertstatus) {
            if ($accounttype == "Savings") {
                $response = $this->MainBanking("4000", $requestid, $accountno, $phoneno, "0", "");
            } else {
                $response = $this->MainBanking("4001", $requestid, $accountno, $phoneno, "0", "");
            }
            if ($response[0] == "00") {
                $date = Carbon::now();
                $posted = true;
                $posteddate = $date->toDateString();
                $postedtime = $date->toTimeString();
                sleep(6);
                $updatestatus = DB::update('update mobile_banking_account_balance set
                    posted="' . $posted . '",
                    posted_date="' . $posteddate . '",
                    posted_time="' . $postedtime . '",
                    response_code="' . $response[0] . '",
                    response_desc=?
                    where request_id=?', [$response[1], $requestid]);
            }
            if ($updatestatus) {
                return $response[1];
            }
        } else {
            return "01";
        }
    }

    function postMinistatement(Request $request) {
        $channeltype = $request->channeltype;
        $accounttype = $request->accounttype;
        $accountno = $request->accountno;
        $accountname = $request->accountname;
        $phoneno = $request->phoneno;

        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();
        $response = "";
        $insertstatus = DB::insert('insert into mobile_banking_ministatement(request_id,channel_type,account_type,account_no,account_name,phone_no,transaction_date,transaction_time)
                             values(?,?,?,?,?,?,?,?)',
                        [$requestid, $channeltype, $accounttype, $accountno, $accountname, $phoneno, $requestdate, $requesttime]);
        if ($insertstatus) {
            if ($accounttype == "Savings") {
                $response = $this->MainBanking("5000", $requestid, $accountno, $phoneno, "0", "");
            } else {
                $response = $this->MainBanking("5001", $requestid, $accountno, $phoneno, "0", "");
            }
            if ($response[0] == "00") {
                $date = Carbon::now();
                $posted = true;
                $posteddate = $date->toDateString();
                $postedtime = $date->toTimeString();
                file_put_contents("mini.txt", print_r($response[1], true));
                $updatestatus = DB::update('update mobile_banking_ministatement set
                    posted="' . $posted . '",
                    posted_date="' . $posteddate . '",
                    posted_time="' . $postedtime . '",
                    response_code="' . $response[0] . '",
                    response_desc=?
                    where request_id=?', [$response[1], $requestid]);
            }
            if ($updatestatus) {
                return $response[1];
            }
        } else {
            return "01";
        }
    }

    function postReferFriend(Request $request) {
        $channeltype = $request->channeltype;
        $referralphoneno = $request->phoneno;
        $surname = $request->surname;
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $nationalid = $request->nationalid;
        $passportno = $request->passportno;
        $hudumano = $request->hudumano;
        $socialname = $request->socialname;
        $gender = $request->gender;
        $nationality = $request->nationality;
        $dob = $request->dob;
        $maritalstatus = $request->maritalstatus;
        $occupation = $request->occupation;
        $pinno = $request->pinno;
        $phoneno = $request->phoneno;
        $postaladdress = $request->postaladdress;
        $emailaddress = $request->emailaddress;
        $physicaladdress = $request->physicaladdress;
        $currentresidence = $request->currentresidence;
        $profileimagebase64 = $request->profileimagebase64; //"";
        $termsofservice = true;
        $date = Carbon::now();
        $requestid = $this->generateRequestID(15);
        $requestdate = $date->toDateString();
        $requesttime = $date->toTimeString();

        $insertstatus = DB::insert('insert into mobile_banking_refer_friend(request_id,channel_type,sur_name,first_name,last_name,social_name,phone_no,huduma_no,national_id,pin_no,nationality,
                                    marital_status,gender,date_of_birth,occupation,postal_address,physical_address,email_address,current_residence,profile_img_base64,referral_phone_no,
                                    transaction_date,transaction_time,terms_of_service)
                                    
                                    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
                        [$requestid, $channeltype, $surname, $firstname, $lastname, $socialname, $phoneno, $hudumano, $nationalid, $pinno, $nationality, $maritalstatus, $gender, $dob, $occupation, $postaladdress,
                            $physicaladdress, $emailaddress, $currentresidence, $profileimagebase64, $referralphoneno, $requestdate, $requesttime, $termsofservice]);
        if ($insertstatus) {
            $soapClient = $this->connectNAV();
            $parameters = [
                'surname' => $surname,
                'firstName' => $firstname,
                'lastName' => $lastname,
                'nationalID' => $nationalid,
                'passportNo' => $passportno,
                'hudumaNo' => $hudumano,
                'socialName' => $socialname,
                'gender' => $gender,
                'nationality' => $nationality,
                'dateofBirth' => "",
                'maritalStatus' => $maritalstatus,
                'occupation' => $occupation,
                'pINNo' => $pinno,
                'phoneNo' => $phoneno,
                'postalAddress' => $postaladdress,
                'emailAddress' => $emailaddress,
                'physicalAddress' => $physicaladdress,
                'currentResidence' => $currentresidence,
                'profileImageBase64' => $profileimagebase64,
                'termsofService' => true,
                'responseCode' => "",
                'responseMessage' => ""
            ];

            try {
                $response = $soapClient->ReferFriend($parameters);
                $responseCode = $response->responseCode;
                $responseMessage = $response->responseMessage;
                if ($responseCode == "00") {
                    return "Success";
                } else {
                    return "Fail";
                }
            } catch (SoapFault $soapFault) {
                var_dump($soapFault);
            }
        }
    }

}

?>