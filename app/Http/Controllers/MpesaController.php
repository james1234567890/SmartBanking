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
use Storage;
use Carbon\Carbon;
use Config;
class MpesaController extends Controller {

    function showMpesaAccountBalance() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $accountbalanceresult = DB::select('select * from mpesa_account_balance');
        return view('mpesa_account_balance', ['accountbalanceresults' => $accountbalanceresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaTransactionStatus() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $transactionstatusresult = DB::select('select * from mpesa_transaction_status');
        return view('mpesa_transaction_status', ['transactionstatusresults' => $transactionstatusresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaC2B() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $c2btransaction = DB::select('select * from mpesa_c2b');
        return view('mpesa_c2b', ['c2btransactions' => $c2btransaction, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaB2C() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $b2cresult = DB::select('select * from mpesa_b2c');
        return view('mpesa_b2c', ['b2cresults' => $b2cresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaB2B() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $b2bresult = DB::select('select * from mpesa_b2b');
        return view('mpesa_b2b', ['b2bresults' => $b2bresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaExpress() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $expressresult = DB::select('select * from mpesa_express');
        return view('mpesa_express', ['expressresults' => $expressresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaExpressQuery() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $expressqueryresult = DB::select('select * from mpesa_express_query');
        return view('mpesa_express_query', ['expressqueryresults' => $expressqueryresult, 'bankaccounts' => $bankaccount]);
    }

    function showMpesaReversal() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=?', ["MPESA Paybill"]);
        $reversalresult = DB::select('select * from mpesa_reversal');
        return view('mpesa_reversal', ['reversalresults' => $reversalresult, 'bankaccounts' => $bankaccount]);
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

    function generateLNMPassword($shortcode) {
        $lipa_time = date('YmdHis'); //'20210113175816';//'20210113195832';
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = $shortcode; //'174379';
        $timestamp = $lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode . $passkey . $timestamp);
        return $lipa_na_mpesa_password;
    }

    function postMpesaRegisterURL(Request $request) {
        //$this->storeMpesaRequest('RegisterURL');
        $response = $this->mpesaRegisterURL($request->shortcode, $request->validationurl, $request->confirmationurl);
        return response()->json($response);
    }

    function mpesaRegisterURL($shortcode, $validationurl, $confirmationurl) {
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization: Bearer ' . $token));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            'ShortCode' => $shortcode,
            'ResponseType' => 'Confirmed',
            'ConfirmationURL' => $confirmationurl, // Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/mpsa_callback/1',
            'ValidationURL' => $validationurl//Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/mpsa_callback/0'
        )));
        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaAccountBalance(Request $request) {

        $response = $this->AccountBalance($request->shortcode);
        $this->storeMpesaRequest($request, $response, 0);
        return response()->json($response);
    }

    function AccountBalance($shortcode) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'Initiator' => 'apiop37',
            'SecurityCredential' => 'XtMGMZKnUTC7mM53x4MYDwJWD0Lnix1VXg2dhzOwW9T0o52EzTpJlZB1c0duw1GK2s476yvf55txX9wkPq2MtNvLBF1pjDVcx9M0D+gPaVJMHgtR37v8n990nnw4YydqYBmpNxYohcdzx+P2i9y21b9j19lGSTDSQUL4/hAUHA6rTHBDRf3RXRd647RVchpI2NuSbqOU21/pDXv8emyaVMM1GMq1C3e2gNDabhSw8s856nxZlXwCESTZ+SqQLNyZs3Yr05yjgqm8Dm2yvy3y2+FrZrYd0FOZArIgHl9PeuEAnSDgwRMSiqPYOAgU2t4xzv2NiCY56fjpH6iD9eUSMw==',
            'CommandID' => 'AccountBalance',
            'PartyA' => $shortcode,
            'IdentifierType' => '4',
            'Remarks' => 'Account Balance',
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/2',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/3',
        );
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaTransactionStatus(Request $request) {
        $response = $this->TransactionStatus($request->transactionid, $request->shortcode);
        $this->storeMpesaRequest($request, $response, 1);
        return response()->json($response);
    }

    function TransactionStatus($transactionid, $shortcode) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';
        $token = $this->generateAccessToken();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'Initiator' => 'apiop37',
            'SecurityCredential' => 'XtMGMZKnUTC7mM53x4MYDwJWD0Lnix1VXg2dhzOwW9T0o52EzTpJlZB1c0duw1GK2s476yvf55txX9wkPq2MtNvLBF1pjDVcx9M0D+gPaVJMHgtR37v8n990nnw4YydqYBmpNxYohcdzx+P2i9y21b9j19lGSTDSQUL4/hAUHA6rTHBDRf3RXRd647RVchpI2NuSbqOU21/pDXv8emyaVMM1GMq1C3e2gNDabhSw8s856nxZlXwCESTZ+SqQLNyZs3Yr05yjgqm8Dm2yvy3y2+FrZrYd0FOZArIgHl9PeuEAnSDgwRMSiqPYOAgU2t4xzv2NiCY56fjpH6iD9eUSMw==',
            'CommandID' => 'TransactionStatusQuery',
            'TransactionID' => $transactionid,
            'PartyA' => $shortcode,
            'IdentifierType' => '4',
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/4',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/4',
            'Remarks' => 'Transaction Status',
            'Occasion' => 'Transaction Status'
        );
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaC2B(Request $request) {

        $response = $this->mpesaC2B($request->shortcode, $request->phoneno, $request->amount, $request->accountreference);
        return response()->json($response);
    }

    function mpesaC2B($shortcode, $phoneno, $amount, $accountreference) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'ShortCode' => $shortcode,
            'CommandID' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'Msisdn' => $phoneno,
            'BillRefNumber' => $accountreference
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);


        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaB2C(Request $request) {

        $response = $this->mpesaB2C($request->shortcode, $request->phoneno, $request->amount, $request->remarks);
        $this->storeMpesaRequest($request, $response, 3);
        return response()->json($response);
    }

    function mpesaB2C($shortcode, $phoneno, $amount, $remarks) {
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
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/7',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/8',
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

    function postMpesaB2B(Request $request) {

        $response = $this->mpesaB2B($request->sendershortcode, $request->amount, $request->accountreference, $request->receivershortcode);
        $this->storeMpesaRequest($request, $response, 4);
        return response()->json($response);
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
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/9',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/10',
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

    function postMpesaExpress(Request $request) {

        $response = $this->mpesaExpress($request->shortcode, $request->phoneno, $request->amount,
                $request->accountreference, $request->accountreference);
        $this->storeMpesaRequest($request, $response, 5);
        return response()->json($response);
    }

    function mpesaExpress($shortcode, $phoneno, $amount, $accountref, $description) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $shortcode,
            'Password' => $this->generateLNMPassword($shortcode),
            'Timestamp' => date('YmdHis'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phoneno,
            'PartyB' => $shortcode,
            'PhoneNumber' => $phoneno,
            'CallBackURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/6',
            'AccountReference' => $accountref,
            'TransactionDesc' => $description
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaExpressQuery(Request $request) {

        $response = $this->mpesaExpressQuery($request->shortcode, $request->checkoutrequestid);
        $this->storeMpesaRequest($request, $response, 6);
        return response()->json($response);
    }

    function mpesaExpressQuery($shortcode, $checkoutrequestid) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $shortcode, //'174379',
            'Password' => $this->generateLNMPassword($shortcode),
            'Timestamp' => date('YmdHis'),
            'CheckoutRequestID' => $checkoutrequestid,
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaReversal(Request $request) {
        $response = $this->mpesaReversal($request->shortcode, $request->transactionid, $request->amount);
        $this->storeMpesaRequest($request, $response, 7);
        return response()->json($response);
    }

    function mpesaReversal($shortcode, $transactionID, $amount) {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';
        $token = $this->generateAccessToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token)); //setting custom header
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'Initiator' => 'apiop37',
            'SecurityCredential' => 'XtMGMZKnUTC7mM53x4MYDwJWD0Lnix1VXg2dhzOwW9T0o52EzTpJlZB1c0duw1GK2s476yvf55txX9wkPq2MtNvLBF1pjDVcx9M0D+gPaVJMHgtR37v8n990nnw4YydqYBmpNxYohcdzx+P2i9y21b9j19lGSTDSQUL4/hAUHA6rTHBDRf3RXRd647RVchpI2NuSbqOU21/pDXv8emyaVMM1GMq1C3e2gNDabhSw8s856nxZlXwCESTZ+SqQLNyZs3Yr05yjgqm8Dm2yvy3y2+FrZrYd0FOZArIgHl9PeuEAnSDgwRMSiqPYOAgU2t4xzv2NiCY56fjpH6iD9eUSMw==',
            'CommandID' => 'TransactionReversal',
            'TransactionID' => $transactionID,
            'Amount' => $amount,
            'ReceiverParty' => $shortcode,
            'RecieverIdentifierType' => '11',
            'ResultURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/11',
            'QueueTimeOutURL' => Config::get('constants.CALLBACK_BASE_URL').'/smartbanking/public/post_callback2/12',
            'Remarks' => 'TEST',
            'Occasion' => 'TEST'
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

        $curl_response = curl_exec($curl);
        $response = json_decode($curl_response);
        return $response;
    }

    function postMpesaCallBack($i) {
        switch ($i) {
            case 0://Validation
                $response = array("ResultCode" => 0, "ResultDesc" => "Accepted"); //echo '{"ResultCode": 0,"ResultDesc": "Accepted"}';
                return json_encode($response);
                break;
            case 1://Confirmation
                $response = json_decode(request()->getContent());
                $this->storeMpesaCallBackResult(2, $response);
                break;
            case 2://AccountBalance-ResultURL

                $response = json_decode(request()->getContent());
                $this->storeMpesaCallBackResult(0, $response);

            //break;
            case 3://AccountBalance-QueueTimeoutURL
                $response = json_decode(request()->getContent());
                file_put_contents("accountbalance_timeout.txt", "");
                break;
            case 4://TransactionStatus-ResultURL
                $response = json_decode(request()->getContent());
                $this->storeMpesaCallBackResult(1, $response);
                break;
            case 5://TransactionStatus-QueueTimeoutURL
                $response = json_decode(request()->getContent());
                file_put_contents("transactionstatus_timeout.txt", "");
                break;
            case 6://STK-CallBackURL
                $response = json_decode(request()->getContent());
                $this->storeMpesaCallBackResult(5, $response);
                break;
            case 7://B2C-ResultURL
                $response = json_decode(request()->getContent());
                file_put_contents("b2c_result.txt", print_r($response,true));
                //$this->storeMpesaCallBackResult(3, $response);

                break;
            case 8://B2C-QueueTimeoutURL
                $response = json_decode(request()->getContent());
                file_put_contents("b2c_timeout.txt", "");
                break;
            case 9://B2B-ResultURL
                $response = json_decode(request()->getContent());
                file_put_contents("opps5663_result.txt", print_r($response->Result->OriginatorConversationID, true));
                $this->storeMpesaCallBackResult(4, $response);
                break;
            case 10://B2B-QueueTimeoutURL
                $response = json_decode(request()->getContent());
                file_put_contents("b2b_timeout.txt", "");
                break;
            case 11://Reversal-ResultURL
                $response = json_decode(request()->getContent());
                $this->storeMpesaCallBackResult(6, $response);
                break;
            case 12://Reversal-QueueTimeoutURL
                $response = json_decode(request()->getContent());
                file_put_contents("reversal_timeout.txt", "");
                break;
            default: {
                    break;
                }
        }
    }

    function storeMpesaRequest($request, $response, $i) {
        switch ($i) {
            case 0://Account Balance
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $originatorconversationid = $response->OriginatorConversationID;
                $status = DB::insert('insert into mpesa_account_balance(request_id,request_type,request_by,request_date,request_time,originator_conversation_id)
                                      values(?,?,?,?,?,?)',
                                [$requestid, "AcountBalance", $requestby, $requestdate, $requesttime, $originatorconversationid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 1://Transaction Status
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $originatorconversationid = $response->OriginatorConversationID;
                $status = DB::insert('insert into mpesa_transaction_status(request_id,request_type,request_by,request_date,request_time,originator_conversation_id)
                             values(?,?,?,?,?,?)',
                                [$requestid, "TransactionStatus", $requestby, $requestdate, $requesttime, $originatorconversationid]);

                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 2://C2B

            case 3://B2C
                //$vendorcategory = $request->vendorcategory;
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $vendorid = $request->vendorid;
                $phoneno = $request->phoneno;
                $remarks = $request->remarks;
                $amount = $request->amount;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $originatorconversationid = $response->OriginatorConversationID;

                $status = DB::insert('insert into mpesa_b2c(vendor_category,vendor_id,vendor_name,phone_no,remarks,amount,request_id,request_by,request_date,request_time,originator_conversation_id)
                                values(?,?,?,?,?,?,?,?,?,?,?)', ["", $vendorid, "", $phoneno, $remarks, $amount, $requestid, $requestby, $requestdate, $requesttime, $originatorconversationid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 4://B2B
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $sendershortcode = $request->input('sendershortcode');
                $receivershortcode = $request->input('receivershortcode');
                $amount = $request->input('amount');
                $accountreference = $request->input('accountreference');
                $originatorconversationid = $response->OriginatorConversationID;
                $status = DB::insert('insert into mpesa_b2b(request_id,request_type,request_by,request_date,request_time,sender_shortcode,receiver_shortcode,amount,account_reference,originator_conversation_id)
                                values(?,?,?,?,?,?,?,?,?,?)',
                                [$requestid, "B2B", $requestby, $requestdate, $requesttime, $sendershortcode, $receivershortcode, $amount, $accountreference, $originatorconversationid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 5://Express
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $shortcode = $request->shortcode;
                $phoneno = $request->phoneno;
                $amount = $request->amount;
                $accountreference = $request->accountreference;
                $merchantrequestid = $response->MerchantRequestID;

                $status = DB::insert('insert into mpesa_express(request_id,request_type,request_by,request_date,request_time,short_code,phone_no,amount,account_reference,merchant_request_id)
                                values(?,?,?,?,?,?,?,?,?,?)',
                                [$requestid, "Express", $requestby, $requestdate, $requesttime, $shortcode, $phoneno, $amount, $accountreference, $merchantrequestid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 6://Express Query
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $shortcode = $request->shortcode;
                $checkoutrequestid = $request->checkoutrequestid;
                $merchantrequestid = $response->MerchantRequestID;
                $responsecode = $response->ResponseCode;
                $responsedesc = $response->ResponseDescription;
                $resultcode = $response->ResultCode;
                $resultdesc = $response->ResultDesc;

                $status = DB::insert('insert into mpesa_express_query(request_id,request_type,request_by,request_date,request_time,short_code,response_code,response_desc,result_code,result_desc,checkout_request_id,merchant_request_id)
                                values(?,?,?,?,?,?,?,?,?,?,?,?)',
                                [$requestid, "ExpressQuery", $requestby, $requestdate, $requesttime, $shortcode, $responsecode, $responsedesc, $resultcode, $resultdesc, $checkoutrequestid, $merchantrequestid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
            case 7:
                $date = Carbon::now();
                $requestid = $this->generateRequestID(10);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $shortcode = $request->shortcode;
                $transactionid = $request->transactionid;
                $amount = $request->amount;
                $originatorconversationid = $response->OriginatorConversationID;



                $status = DB::insert('insert into mpesa_reversal(request_id,request_type,request_by,request_date,request_time,short_code,transaction_id,amount,originator_conversation_id)
                                values(?,?,?,?,?,?,?,?,?)',
                                [$requestid, "Reversal", $requestby, $requestdate, $requesttime, $shortcode, $transactionid, $amount, $originatorconversationid]);
                if ($status) {
                    return response()->json(['success' => 'Success']);
                } else {
                    return response()->json(['error' => 'Ajax request failed']);
                }
        }
    }

    function getMpesaCallBack($i, $originatorconversationid) {
        switch ($i) {
            case 0://Account Balance
                sleep(10);
                $mpesaaccountbalance = DB::select('select account_balance from mpesa_account_balance where originator_conversation_id = ?', [$originatorconversationid]);
                $mpesaaccountbalance0 = $mpesaaccountbalance[0]->account_balance;
                $mpesaaccountbalanceexplodedvalue = explode('&', $mpesaaccountbalance0);

                $workingaccount = explode("|", $mpesaaccountbalanceexplodedvalue[0]);
                $floataccount = explode("|", $mpesaaccountbalanceexplodedvalue[1]);
                $utilityaccount = explode("|", $mpesaaccountbalanceexplodedvalue[2]);
                $chargespaidacount = explode("|", $mpesaaccountbalanceexplodedvalue[3]);
                $orgsettlementaccount = explode("|", $mpesaaccountbalanceexplodedvalue[4]);

                $workingamount = $workingaccount[2];
                $floatamount = $floataccount[2];
                $utilityamount = $utilityaccount[2];
                $chargespaidamount = $chargespaidacount[2];
                $orgsettlementamount = $orgsettlementaccount[2];

                $acountamountarr = array($workingamount, $floatamount, $utilityamount, $chargespaidamount, $orgsettlementamount);
                return response()->json($acountamountarr);
            // break;

            case 1://Transaction Status
                sleep(10);
                $mpesatransactionstatus = DB::select('select result_desc from mpesa_transaction_status where originator_conversation_id = ?', [$originatorconversationid]);
                $resultdesc = $mpesatransactionstatus[0]->result_desc;
                return response()->json($resultdesc);

            case 2:// Mpesa C2B
                sleep(0);
                return response()->json("Success");
            case 3://Mpesa B2C
                sleep(10);
                $mpesab2c = DB::select('select * from mpesa_b2c where originator_conversation_id = ?', [$originatorconversationid]);
                $resultdesc = $mpesab2c[0]->result_desc;
                return response()->json($resultdesc);
            case 4://Mpesa B2B
                sleep(10);
                $mpesab2b = DB::select('select result_desc from mpesa_b2b where originator_conversation_id = ?', [$originatorconversationid]);
                $resultdesc = $mpesab2b[0]->result_desc;
                return response()->json($resultdesc);
            case 5://Mpesa Express
                sleep(15);
                $mpesaexpress = DB::select('select result_desc from mpesa_express where merchant_request_id = ?', [$originatorconversationid]);
                $resultdesc = $mpesaexpress[0]->result_desc;
                return response()->json($resultdesc);
            case 6://Mpesa Express Query

            case 7://Mpesa Reversal
                sleep(10);
                $mpesareversal = DB::select('select result_desc from mpesa_reversal where originator_conversation_id = ?', [$originatorconversationid]);
                $resultdesc = $mpesareversal[0]->result_desc;
                return response()->json($resultdesc);
        }
    }

    function storeMpesaCallBackResult($i, $response) {
        switch ($i) {
            case 0://Account Balance
                $resultcode = $response->Result->ResultCode;
                $resultdesc = $response->Result->ResultDesc;
                $originatorconversationid = $response->Result->OriginatorConversationID;
                $conversationid = $response->Result->ConversationID;
                $transactionid = $response->Result->TransactionID;
                $accountbalance = $response->Result->ResultParameters->ResultParameter[0]->Value;
                $transcompleteddatetime = $response->Result->ResultParameters->ResultParameter[1]->Value;
                $ocidexist = DB::select('select originator_conversation_id from mpesa_account_balance where originator_conversation_id=?', [$originatorconversationid]);

                if ($ocidexist) {
                    DB::update('update mpesa_account_balance set
         
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '",
                    account_balance="' . $accountbalance . '",
                    completed_datetime="' . $transcompleteddatetime . '"

                    where originator_conversation_id=?', [$originatorconversationid]);
                }
            case 1://Transaction Status
                $resultcode = $response->Result->ResultCode;
                $resultdesc = $response->Result->ResultDesc;
                $originatorconversationid = $response->Result->OriginatorConversationID;
                $conversationid = $response->Result->ConversationID;
                $transactionid = $response->Result->TransactionID;
                $occasion = $response->Result->ReferenceData->ReferenceItem->Value;
                $ocidexist = DB::select('select originator_conversation_id from mpesa_transaction_status where originator_conversation_id=?', [$originatorconversationid]);

                if ($ocidexist) {
                    DB::update('update mpesa_transaction_status set
         
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '",
                    occasion="' . $occasion . '"
                        
                    where originator_conversation_id=?', [$originatorconversationid]);
                }
            case 2://C2B
                $transactiontype = $response->TransactionType;
                $transid = $response->TransID;
                $transtime = $response->TransTime;
                $transamount = $response->TransAmount;
                $businessshortcode = $response->BusinessShortCode;
                $billrefno = $response->BillRefNumber;
                $invoiceno = $response->InvoiceNumber;
                $msisdn = $response->MSISDN;
                $orgaccountbalance = $response->OrgAccountBalance;
                $firstname = $response->FirstName;
                $middlename = $response->MiddleName;
                $lastname = $response->LastName;
                $status = DB::insert('insert into mpesa_c2b
                    (   transaction_type,
                        transaction_id,
                        transaction_time,
                        first_name,
                        middle_name,
                        last_name,
                        business_short_code,
                        bill_ref_number,
                        invoice_number,
                        msisdn,transaction_amount,
                        org_account_balance
                    )
                    values(?,?,?,?,?,?,?,?,?,?,?,?)',
                                [$transactiontype,
                                    $transid,
                                    $transtime,
                                    $firstname,
                                    $middlename,
                                    $lastname,
                                    $businessshortcode,
                                    $billrefno,
                                    $invoiceno,
                                    $msisdn,
                                    $transamount,
                                    $orgaccountbalance
                ]);
                if ($status) {
                    $result = array("C2BPaymentConfirmationResult" => "Success");                //echo '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}'; // echo '{"C2BPaymentConfirmationResult": "Success"}';
                    return json_encode($result);
                }
            case 3://B2C
                //$resulttype = $response->Result->ResultType;
                $resultcode = $response->Result->ResultCode;
                $resultdesc = $response->Result->ResultDesc;
                $originatorconversationid = $response->Result->OriginatorConversationID;
                $conversationid = $response->Result->ConversationID;
                $transactionid = $response->Result->TransactionID;
                $ocidexist = DB::select('select originator_conversation_id from mpesa_b2c where originator_conversation_id=?', [$originatorconversationid]);

                if ($ocidexist) {
                    DB::update('update mpesa_b2c set
                        
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '"
                        
                    where originator_conversation_id=?', [$originatorconversationid]);
                }
            case 4://B2B
                $resulttype = $response->Result->ResultType;
                $resultcode = $response->Result->ResultCode;
                $resultdesc = $response->Result->ResultDesc;
                $originatorconversationid = $response->Result->OriginatorConversationID;
                $conversationid = $response->Result->ConversationID;
                $transactionid = $response->Result->TransactionID;
                $ocidexist = DB::select('select originator_conversation_id from mpesa_b2b where originator_conversation_id=?', [$originatorconversationid]);

                if ($ocidexist) {
                    DB::update('update mpesa_b2b set
         
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    transaction_id="' . $transactionid . '"
                        
                    where originator_conversation_id=?', [$originatorconversationid]);
                }
            case 5://Express

                $resultcode = $response->Body->stkCallback->ResultCode;
                $resultdesc = $response->Body->stkCallback->ResultDesc;
                $merchantrequestid = $response->Body->stkCallback->MerchantRequestID;
                $checkoutrequestid = $response->Body->stkCallback->CheckoutRequestID;
                $mcidexist = DB::select('select merchant_request_id from mpesa_express where merchant_request_id=?', [$merchantrequestid]);

                if ($mcidexist) {
                    DB::update('update mpesa_express set
         
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    merchant_request_id="' . $merchantrequestid . '",
                    checkout_request_id="' . $checkoutrequestid . '"
                        
                    where merchant_request_id=?', [$merchantrequestid]);
                }
            case 6://Reversal
                $resulttype = $response->Result->ResultType;
                $resultcode = $response->Result->ResultCode;
                $resultdesc = $response->Result->ResultDesc;
                $originatorconversationid = $response->Result->OriginatorConversationID;
                $conversationid = $response->Result->ConversationID;
                $transactionid = $response->Result->TransactionID;
                $ocidexist = DB::select('select originator_conversation_id from mpesa_reversal where originator_conversation_id=?', [$originatorconversationid]);

                if ($ocidexist) {
                    DB::update('update mpesa_reversal set
         
                    result_code="' . $resultcode . '",
                    result_desc="' . $resultdesc . '",
                    conversation_id="' . $conversationid . '",
                    result_transaction_id="' . $transactionid . '"
                        
                    where originator_conversation_id=?', [$originatorconversationid]);
                }
        }
    }

}

?>