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
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class COOPController extends Controller {
    
    function showCOOPAccountBalance() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $accountbalanceresult = DB::select('select * from coop_account_balance');
        return view('coop_account_balance', ['accountbalanceresults' => $accountbalanceresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPTransactionStatus() {
        $transactionstatusresult = DB::select('select * from coop_transaction_status');
        return view('coop_transaction_status', ['transactionstatusresults' => $transactionstatusresult]);
    }

    function showCOOPAccountTransactions() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $accounttransactionsresult = DB::select('select * from coop_account_transaction');
        return view('coop_account_transactions', ['accounttransactionsresults' => $accounttransactionsresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPMinistatement() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $ministatementresult = DB::select('select * from coop_ministatement');
        return view('coop_ministatement', ['ministatementresults' => $ministatementresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPFullstatement() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $fullstatementresult = DB::select('select * from coop_fullstatement');
        return view('coop_fullstatement', ['fullstatementresults' => $fullstatementresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPIFT() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $iftresult = DB::select('select * from coop_ift');
        return view('coop_ift', ['iftresults' => $iftresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPSendToMpesa() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $sendtompesaresult = DB::select('select * from coop_send_to_mpesa');
        return view('coop_send_to_mpesa', ['sendtompesaresults' => $sendtompesaresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPPesaLinkToAccount() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $pesalinktoaccountresult = DB::select('select * from coop_pesalink_to_account');
        return view('coop_pesalink_to_account', ['pesalinktoaccountresults' => $pesalinktoaccountresult]);
    }

    function showCOOPPesaLinkToPhone() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $pesalinktophoneresult = DB::select('select * from coop_pesalink_to_phone');
        return view('coop_pesalink_to_phone', ['pesalinktophoneresults' => $pesalinktophoneresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPExchangeRate() {
        $bankaccount = DB::select('select * from bank_account where bank_account_type=? and bank_code=?', ["Bank Account","11"]);
        $exchangerateresult = DB::select('select * from coop_exchange_rate');
        return view('coop_exchange_rate', ['exchangerateresults' => $exchangerateresult,'bankaccounts' => $bankaccount]);
    }

    function showCOOPAccountValidation() {
        $accountvalidationresult = DB::select('select * from coop_account_validation');
        return view('coop_account_validation', ['accountvalidationresults' => $accountvalidationresult]);
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

    function generateMessageReference($length) {
        $random_string = '';
        for ($i = 0; $i < $length; $i++) {
            $number = random_int(0, 36);
            $character = base_convert($number, 10, 36);
            $random_string .= $character;
        }

        return $random_string;
    }

    function generateAccessToken() {
        $url = 'https://developer.co-opbank.co.ke:8243/token';
        $consumerKey = 'u71EKA4VR22aquM8zJdaGqJKmfMa';
        $secretKey = 'eT5w4GLF2lkNuWKeHMMadXhl3d0a';
        $authorization = base64_encode("$consumerKey:$secretKey");
        $header = array("Authorization: Basic {$authorization}");
        $content = "grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content
        ));

        $response = curl_exec($curl);
        if ($response === false) {
            echo "Failed";
            echo curl_error($curl);
            echo "Failed";
            exit(0);
        }
        $token = json_decode($response)->access_token;
        return $token;
    }

    function postAccountBalance(Request $request) {
        $response = $this->AccountBalance($request->accountno);
        $this->storeCOOPRequest($request, $response, 0);
        return response()->json($response);
    }

    function AccountBalance($accountNo) {
        $requestPayload = '{

          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "AccountNumber":"' . $accountNo . '"

        } ';

        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/AccountBalance/1.0.0/';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);
        $response = json_decode($return);

        return $response;
    }

    function postTransactionStatus(Request $request) {
        $response = $this->TransactionStatus($request->messagereference);
        $this->storeCOOPRequest($request, $response, 1);
        return response()->json($response);
    }

    function TransactionStatus($messageReference) {

        $requestPayload = '{
            "MessageReference": "' . $messageReference . '"
         }';
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/TransactionStatus/2.0.0';

        $token = $this->generateAccessToken();
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);
        $response = json_decode($return);

        return $response;
    }

    function postAccountTransactions(Request $request) {
        $response = $this->AccountTransactions($request->accountno, $request->nooftransactions);
        $this->storeCOOPRequest($request, $response, 2);
        return response()->json($response);
    }

    function AccountTransactions($accountNo, $NoofTransactions) {
        $requestPayload = '{
          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "AccountNumber": "' . $accountNo . '",
          "NoOfTransactions": "' . $NoofTransactions . '"
        }';

        //echo $token;
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/AccountTransactions/1.0.0/';
        $token = $this->generateAccessToken();
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);
        
        $response = json_decode($return);
        return $response;
    }

    function postMiniStatement(Request $request) {
        $response = $this->AccountMiniStatement($request->accountno);
        $this->storeCOOPRequest($request, $response, 3);
        return response()->json($response);
    }

    function AccountMiniStatement($accountNo) {
        $requestPayload = '{
          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "AccountNumber": "' . $accountNo . '"
        } ';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/MiniStatement/Account/1.0.0';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postFullStatement(Request $request) {
        $noofmonthsbackwards = $request->noofmonthsbackwards;
        $response = $this->AccountFullStatement($request->accountno, date("Y-m-d", strtotime("-" . $noofmonthsbackwards . " months")), date("Y-m-d"));
        $this->storeCOOPRequest($request, $response, 4);
        return response()->json($response);
    }

    function AccountFullStatement($accountNo, $startDate, $endDate) {
        $requestPayload = '{
			  "MessageReference": "' . $this->generateMessageReference(20) . '",
			  "AccountNumber": "' . $accountNo . '",
			  "StartDate": "' . $startDate . '",
			  "EndDate": "' . $endDate . '"
		}';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/FullStatement/Account/1.0.0/';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);

        return $response;
    }

    function postIFTSource(Request $request) {

        $request->session()->put('sourceaccountno', $request->input('sourceaccountno'));
        $request->session()->put('amount', $request->input('amount'));
        $request->session()->put('narration', $request->input('narration'));

        return response()->json(['success' => "Success" . $request->input('narration')]);
    }

    function postIFTDestination(Request $request) {

        $request->session()->put('destinationaccountno', $request->input('destinationaccountno'));
        $request->session()->put('destinationbankcode', $request->input('destinationbankcode'));
        $request->session()->put('destinationbranchcode', $request->input('destinationbranchcode'));
        return response()->json(['success' => "Success" . $request->input('destinationaccountno')]);
    }

    function postIFTAccountToAccount(Request $request) {

        $sourceaccountno = $request->session()->get('sourceaccountno');
        $amount = $request->session()->get('amount');
        $narration = $request->session()->get('narration');
        $destinationaccountno = $request->session()->get('destinationaccountno');
        $destinationbankcode = $request->session()->get('destinationbankcode');
        $destinationbranchcode = $request->session()->get('destinationbranchcode');
        $response = $this->IFTAccountToAccount($sourceaccountno, $amount, $narration,
                $destinationaccountno, $destinationbankcode, $destinationbranchcode);
        $this->storeCOOPRequest($request, $response, 5);
        return response()->json($response);
    }

    function IFTAccountToAccount($sourceAccountNo, $amount, $narration,
            $destinationAccountNo, $destinationBankCode, $destinationBranchCode) {
        $requestPayload = '{
          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "CallBackUrl":"'.Config::get('constants.CALLBACK_BASE_URL').'"/smartbanking/public/post_callback/0",
          "Source": {
            "AccountNumber":"' . $sourceAccountNo . '",
            "Amount": "' . $amount . '",
            "TransactionCurrency": "KES",
            "Narration": "' . $narration . '"
          },

          "Destinations": [
            {
              "ReferenceNumber": "' . $this->generateMessageReference(20) . '",
              "AccountNumber": "' . $destinationAccountNo . '",
              "BankCode": "' . $destinationBankCode . '",
              "BranchCode": "' . $destinationBranchCode . '",
              "Amount": "' . $amount . '",
              "TransactionCurrency": "KES",
              "Narration": "' . $narration . '"
            }

          ]

        }';
        //https://pruvententerprisesolutionsltd.com/pesl/smartbanking/ift_callback
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/FundsTransfer/Internal/A2A/2.0.0/';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postSendToMpesaSource(Request $request) {
        $request->session()->put('sourceaccountno', $request->input('sourceaccountno'));
        $request->session()->put('amount', $request->input('amount'));
        $request->session()->put('narration', $request->input('narration'));
    }

    function postSendToMpesaDestination(Request $request) {
        $request->session()->put('destinationmobileno', $request->input('phoneno'));
    }

    function postSendToMpesa(Request $request) {
        $sourceaccountno = $request->session()->get('sourceaccountno');
        $amount = $request->session()->get('amount');
        $narration = $request->session()->get('narration');
        $destinationmobileno = $request->session()->get('destinationmobileno');

        $response = $this->SendToMpesa($sourceaccountno, $amount, $narration,
                $destinationmobileno);
        $this->storeCOOPRequest($request, $response, 6);
        return response()->json($response);
    }

    function SendToMpesa($sourceAccountNo, $amount, $narration, $destinationMobileNo) {
        $requestPayload = '{
            "MessageReference": "' . $this->generateMessageReference(20) . '",
            "CallBackUrl": "'.Config::get('constants.CALLBACK_BASE_URL').'"/smartbanking/public/post_callback/1",
            "Source": {
              "AccountNumber": "' . $sourceAccountNo . '",
              "Amount": "' . $amount . '",
              "TransactionCurrency": "KES",
              "Narration": "' . $narration . '"
            },
            "Destinations": [
              {
                "ReferenceNumber": "' . $this->generateMessageReference(20) . '",
                "MobileNumber": "' . $destinationMobileNo . '",
                "Amount": "' . $amount . '",
                "Narration": "' . $narration . '"

              }

            ]

          }';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/FundsTransfer/External/A2M/Mpesa/1.0.0';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postPesaLinkSendToAccountSource(Request $request) {
        $request->session()->put('sourceaccountno', $request->input('sourceaccountno'));
        $request->session()->put('amount', $request->input('amount'));
        $request->session()->put('narration', $request->input('narration'));
    }

    function postPesaLinkSendToAccountDestination(Request $request) {
        $request->session()->put('destinationaccountno', $request->input('destinationaccountno'));
        $request->session()->put('destinationbankcode', $request->input('destinationbankcode'));
    }

    function postPesaLinkSendToAccount(Request $request) {
        $sourceaccountno = $request->session()->get('sourceaccountno');
        $amount = $request->session()->get('amount');
        $narration = $request->session()->get('narration');
        $destinationaccountno = $request->session()->get('destinationaccountno');
        $destinationbankcode = $request->session()->get('destinationbankcode');
        $response = $this->PesaLinkSendToAccount($sourceaccountno, $amount, $narration,
                $destinationaccountno, $destinationbankcode);
        $this->storeCOOPRequest($request, $response, 7);
        return response()->json($response);
    }

    function PesaLinkSendToAccount($sourceAccountNo, $amount, $narration,
            $destinationAccountNo, $destinationBankCode) {
        $requestPayload = '{
          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "CallBackUrl": "'.Config::get('constants.CALLBACK_BASE_URL').'"/smartbanking/public/post_callback/2",
          "Source": {
            "AccountNumber": "' . $sourceAccountNo . '",
            "Amount": "' . $amount . '",
            "TransactionCurrency": "KES",
            "Narration": "' . $narration . '"
          },

          "Destinations": [
            {
              "ReferenceNumber": "' . $this->generateMessageReference(20) . '",
              "AccountNumber": "' . $destinationAccountNo . '",
              "BankCode": "' . $destinationBankCode . '",
              "Amount": "' . $amount . '",
              "TransactionCurrency": "KES",
              "Narration": "' . $narration . '"
            }
          ]

        }';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/FundsTransfer/External/A2A/PesaLink/1.0.0';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postPesaLinkSendToPhoneSource(Request $request) {
        $request->session()->put('sourceaccountno', $request->input('sourceaccountno'));
        $request->session()->put('amount', $request->input('amount'));
        $request->session()->put('narration', $request->input('narration'));
    }

    function postPesaLinkSendToPhoneDestination(Request $request) {
        $request->session()->put('destinationmobileno', $request->input('phoneno'));
    }

    function postPesaLinkSendToPhone(Request $request) {
        $sourceaccountno = $request->session()->get('sourceaccountno');
        $amount = $request->session()->get('amount');
        $narration = $request->session()->get('narration');
        $destinationmobileno = $request->session()->get('destinationmobileno');

        $response = $this->PesaLinkSendToPhone($sourceaccountno, $amount, $narration,
                $destinationmobileno);
        $this->storeCOOPRequest($request, $response, 8);
        return response()->json($response);
    }

    function PesaLinkSendToPhone($sourceAccountNo, $amount, $narration, $destinationMobileNo) {
        $requestPayload = '{

          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "CallBackUrl": "'.Config::get('constants.CALLBACK_BASE_URL').'"/smartbanking/public/post_callback/3",
          "Source": {
            "AccountNumber": "' . $sourceAccountNo . '",
            "Amount": "' . $amount . '",
            "TransactionCurrency": "KES",
            "Narration": "' . $narration . '"
          },

          "Destinations": [
            {
              "ReferenceNumber": "' . $this->generateMessageReference(20) . '",
              "PhoneNumber": "' . $destinationMobileNo . '",
              "Amount": "' . $amount . '",
              "TransactionCurrency": "KES",
              "Narration": "' . $narration . '"
            }

          ]

        }';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/FundsTransfer/External/A2M/PesaLink/1.0.0';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postExchangeRate() {
        $response = $this->ExchangeRate();
        //$this->storeCOOPRequest("", $response, 9);
        return response()->json($response);
    }

    function ExchangeRate() {
        $requestPayload = '{

          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "FromCurrencyCode": "KES",
          "ToCurrencyCode": "USD"
        }';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/ExchangeRate/1.0.0/';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function postAccountValidation(Request $request) {
        $response = $this->AccountValidation($request->accountno);
        $this->storeCOOPRequest($request, $response, 10);
        return response()->json($response);
    }

    function AccountValidation($accountNo) {
        $requestPayload = '{
          "MessageReference": "' . $this->generateMessageReference(20) . '",
          "AccountNumber": "' . $accountNo . '"
        }';
        $token = $this->generateAccessToken();
        $url = 'https://developer.co-opbank.co.ke:8243/Enquiry/Validation/Account/1.0.0';
        $headers = array('Content-Type: application/json', "Authorization: Bearer {$token}");
        $process = curl_init();
        curl_setopt($process, CURLOPT_URL, $url);
        curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($process, CURLOPT_POSTFIELDS, $requestPayload);
        curl_setopt($process, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($process, CURLOPT_TIMEOUT, 30);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($process);
        curl_close($process);

        $response = json_decode($return);
        return $response;
    }

    function storeCOOPRequest($request, $response, $i) {
        switch ($i) {
            case 0://Account Balance
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_account_balance(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "AccountBalance", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 1://Transaction Status
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_transaction_status(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "TransactionStatus", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 2://Account Transactions
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_account_transaction(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "AccountTransactions", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 3://Ministatement
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_ministatement(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "Ministatement", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 4://Fullstatement
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_fullstatement(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "Fullstatement", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 5://IFT
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_ift(request_id,request_type,request_by,request_date,request_time,message_reference)
                             values(?,?,?,?,?,?)',
                                [$requestid, "IFT", $requestby, $requestdate, $requesttime, $messagereference]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 6://Send to Mpesa
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_send_to_mpesa(request_id,request_type,request_by,request_date,request_time,message_reference)
                             values(?,?,?,?,?,?)',
                                [$requestid, "SendToMpesa", $requestby, $requestdate, $requesttime, $messagereference]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 7://PesaLink to Account
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_pesalink_to_account(request_id,request_type,request_by,request_date,request_time,message_reference)
                             values(?,?,?,?,?,?)',
                                [$requestid, "PesaLinkToAccount", $requestby, $requestdate, $requesttime, $messagereference]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 8://PesaLink to Phone
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_pesalink_to_phone(request_id,request_type,request_by,request_date,request_time,message_reference)
                             values(?,?,?,?,?,?)',
                                [$requestid, "PesaLinkToPhone", $requestby, $requestdate, $requesttime, $messagereference]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 9://Exchange Rate
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_exchange_rate(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "ExchangeRate", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
            case 10://Account Validation
                $date = Carbon::now();
                $requestid = $this->generateRequestID(20);
                $requestby = Auth::user()->username;
                $requestdate = $date->toDateString();
                $requesttime = $date->toTimeString();
                $messagereference = $response->MessageReference;
                $status = DB::insert('insert into coop_account_validation(request_id,request_type,request_by,request_date,request_time,message_reference,raw_response)
                             values(?,?,?,?,?,?,?)',
                                [$requestid, "AccountValidation", $requestby, $requestdate, $requesttime, $messagereference, json_encode($response)]);
                if ($status) {
                    return response()->json(['success' => 'Successful Callback']);
                }
        }
    }

    function postCallBack($i) {

        switch ($i) {
            case 0://IFT
                $response = json_decode(request()->getContent());
                $mrexist = DB::select('select message_reference from coop_ift where message_reference=?', [$response->messageReference]);
                if ($mrexist) {
                    $status = DB::update('update coop_ift set message_datetime=?,message_code=?,message_description=?,raw_response=? where message_reference=?', [$response->messageDateTime, $response->messageCode, $response->messageDescription, json_encode($response), $response->messageReference]);
                    if ($status) {
                        
                    }
                }

                break;
            case 1://Send to Mpesa
                $response = json_decode(request()->getContent());
                $mrexist = DB::select('select message_reference from coop_send_to_mpesa where message_reference=?', [$response->MessageReference]);
                if ($mrexist) {
                    $status = DB::update('update coop_send_to_mpesa set message_datetime=?,message_code=?,message_description=?,raw_response=? where message_reference=?', [$response->MessageDateTime, $response->MessageCode, $response->MessageDescription, json_encode($response), $response->MessageReference]);
                    if ($status) {
                        
                    }
                }
                break;
            case 2://PesaLink to Account
                $response = json_decode(request()->getContent());
                $mrexist = DB::select('select message_reference from coop_pesalink_to_account where message_reference=?', [$response->MessageReference]);
                if ($mrexist) {
                    $status = DB::update('update coop_pesalink_to_account set message_datetime=?,message_code=?,message_description=?,raw_response=? where message_reference=?', [$response->MessageDateTime, $response->MessageCode, $response->MessageDescription, json_encode($response), $response->MessageReference]);
                    if ($status) {
                        
                    }
                }
                break;
            case 3://PesaLink to Phone
                $response = json_decode(request()->getContent());
                $mrexist = DB::select('select message_reference from coop_pesalink_to_phone where message_reference=?', [$response->MessageReference]);
                if ($mrexist) {
                    $status = DB::update('update coop_pesalink_to_phone set message_datetime=?,message_code=?,message_description=?,raw_response=? where message_reference=?', [$response->MessageDateTime, $response->MessageCode, $response->MessageDescription, json_encode($response), $response->MessageReference]);
                    if ($status) {
                        
                    }
                }
            case 4:
                file_put_contents("hello.txt", "Hello James");
                break;
        }
    }

    function getCallBack($i, $messagereference) {
        switch ($i) {
            case 0://internal funds transfer, A2A
                sleep(7);
                $ift = DB::select('select message_description from coop_ift where message_reference = ?', [$messagereference]);
                $messagedesc = $ift[0]->message_description;
                return response()->json($messagedesc);
                break;
            case 1://send to mpesa
                sleep(5);
                $sendtompesa = DB::select('select message_description from coop_send_to_mpesa where message_reference = ?', [$messagereference]);
                $messagedesc = $sendtompesa[0]->message_description;
                return response()->json($messagedesc);
                break;
            case 2://pesalink send to account
                sleep(8);
                $pesalinktoaccount = DB::select('select message_description from coop_pesalink_to_account where message_reference = ?', [$messagereference]);
                $messagedesc = $pesalinktoaccount[0]->message_description;
                return response()->json($messagedesc);
                break;
            case 3://pesalink send to phone
                sleep(8);
                $pesalinktophone = DB::select('select message_description from coop_pesalink_to_phone where message_reference = ?', [$messagereference]);
                $messagedesc = $pesalinktophone[0]->message_description;
                return response()->json($messagedesc);
                break;
            default:
        }
    }

}

?>