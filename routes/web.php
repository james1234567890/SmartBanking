 <?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\COOPController;
use App\Http\Controllers\MobileBankingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/show_login', [UserController::class,'showLogin']);
Route::get('/show_add_user', [UserController::class,'showAddUser']);
Route::get('/show_dashboard', [UserController::class,'showDashboard']);
Route::get('/show_users', [UserController::class,'showUsers']);
Route::get('/show_edit_user/{id}', [UserController::class,'editUser']);
Route::get('/get_user/{id}', [FinanceController::class,'getUser']);
Route::get('/get_users', [FinanceController::class,'getUsers']);
Route::get('/logout', [UserController::class,'logout']);

Route::get('/show_add_vendor', [FinanceController::class,'showAddVendor']);
Route::get('/show_vendors', [FinanceController::class,'showVendors']);
Route::get('/get_vendor/{id}', [FinanceController::class,'getVendor']);
Route::get('/get_vendors', [FinanceController::class,'getVendors']);
Route::get('/show_add_bank_account', [FinanceController::class,'showAddBankAccount']);
Route::get('/show_bank_accounts', [FinanceController::class,'showBankAccounts']);

Route::get('/show_mpesa_account_balance', [MpesaController::class,'showMpesaAccountBalance']);
Route::get('/show_mpesa_transaction_status', [MpesaController::class,'showMpesaTransactionStatus']);
Route::get('/show_mpesa_c2b', [MpesaController::class,'showMpesaC2B']);
Route::get('/show_mpesa_b2c', [MpesaController::class,'showMpesaB2C']);
Route::get('/show_mpesa_b2b', [MpesaController::class,'showMpesaB2B']);
Route::get('/show_mpesa_express', [MpesaController::class,'showMpesaExpress']);
Route::get('/show_mpesa_express_query', [MpesaController::class,'showMpesaExpressQuery']);
Route::get('/show_mpesa_reversal', [MpesaController::class,'showMpesaReversal']);

Route::get('/mpesa_c2b_transactions', [MpesaController::class,'getMpesaC2BTransactions']);
Route::get('/mpesa_b2c_transactions', [MpesaController::class,'getMpesaB2CTransactions']);
Route::get('/mpesa_b2b_transactions', [MpesaController::class,'getMpesaB2BTransactions']);
Route::get('/mpesa_express_transactions', [MpesaController::class,'getMpesaExpressTransactions']);

Route::get('/show_add_company', [AdminController::class,'showAddCompany']);
Route::get('/show_company', [AdminController::class,'showCompany']);
Route::get('/picture/{picturename}', [AdminController::class,'getCompanyPicture']);
Route::get('/show_permissions', [AdminController::class,'showPermissions']);

Route::post('/post_user_login', [UserController::class,'postUserLogin']); 
Route::post('/post_user_general', [UserController::class,'postUserGeneral']);
Route::post('/post_user_communication', [UserController::class,'postUserCommunication']);
Route::post('/post_user_security', [UserController::class,'postUserSecurity']); 
Route::post('/post_user_register', [UserController::class,'postUserRegister']);

Route::post('/post_vendor_general', [FinanceController::class,'postVendorGeneral']);
Route::post('/post_vendor_communication', [FinanceController::class,'postVendorCommunication']);
Route::post('/post_vendor_invoicing', [FinanceController::class,'postVendorInvoicing']); 
Route::post('/post_vendor_register', [FinanceController::class,'postVendorRegister']);

Route::post('/post_bankacc_general', [FinanceController::class,'postBankAccountGeneral']);
Route::post('/post_bankacc_communication', [FinanceController::class,'postBankAccountCommunication']);
Route::post('/post_bankacc_posting', [FinanceController::class,'postBankAccountPosting']); 
Route::post('/post_bankacc_register', [FinanceController::class,'postBankAccountRegister']);

Route::post('/post_company', [AdminController::class,'postCompany']);

Route::get('/mpesa_callback/{i}/{ocid}', [MpesaController::class,'getMpesaCallBack']);
Route::post('/post_callback2/{i}', [MpesaController::class,'postMpesaCallBack']);
Route::post('/mpesa_register_url', [MpesaController::class,'postMpesaRegisterURL']);
Route::post('/mpesa_account_balance', [MpesaController::class,'postMpesaAccountBalance']);
Route::post('/mpesa_transaction_status', [MpesaController::class,'postMpesaTransactionStatus']);
Route::post('/mpesa_c2b', [MpesaController::class,'postMpesaC2B']);
Route::post('/mpesa_b2c', [MpesaController::class,'postMpesaB2C']);
Route::post('/mpesa_b2b', [MpesaController::class,'postMpesaB2B']);
Route::post('/mpesa_express', [MpesaController::class,'postMpesaExpress']);
Route::post('/mpesa_express_query', [MpesaController::class,'postMpesaExpressQuery']);
Route::post('/mpesa_reversal', [MpesaController::class,'postMpesaReversal']);



//==============COOP BANK==========
Route::get('/show_coop_account_balance', [COOPController::class,'showCOOPAccountBalance']);
Route::get('/show_coop_transaction_status', [COOPController::class,'showCOOPTransactionStatus']);
Route::get('/show_coop_account_transactions', [COOPController::class,'showCOOPAccountTransactions']);
Route::get('/show_coop_ministatement', [COOPController::class,'showCOOPMinistatement']);
Route::get('/show_coop_fullstatement', [COOPController::class,'showCOOPFullstatement']);
Route::get('/show_coop_ift', [COOPController::class,'showCOOPIFT']);
Route::get('/show_coop_send_to_mpesa', [COOPController::class,'showCOOPSendToMpesa']);
Route::get('/show_coop_pesalink_to_account', [COOPController::class,'showCOOPPesaLinkToAccount']);
Route::get('/show_coop_pesalink_to_phone', [COOPController::class,'showCOOPPesaLinkToPhone']);
Route::get('/show_coop_exchange_rate', [COOPController::class,'showCOOPExchangeRate']);
Route::get('/show_coop_account_validation', [COOPController::class,'showCOOPAccountValidation']);




Route::get('/coop_callback/{id}/{mr}', [COOPController::class,'getCallBack']);
Route::post('/post_callback/{id}', [COOPController::class,'postCallBack']);

Route::post('/coop_account_balance', [COOPController::class,'postAccountBalance']);
Route::post('/coop_transaction_status', [COOPController::class,'postTransactionStatus']);
Route::post('/coop_account_transactions', [COOPController::class,'postAccountTransactions']);
Route::post('/coop_ministatement', [COOPController::class,'postMiniStatement']);
Route::post('/coop_fullstatement', [COOPController::class,'postFullStatement']);
Route::post('/ift_source', [COOPController::class,'postIFTSource']);
Route::post('/ift_destination', [COOPController::class,'postIFTDestination']);
Route::post('/ift_account_to_account', [COOPController::class,'postIFTAccountToAccount']);

Route::post('/send_to_mpesa_source', [COOPController::class,'postSendToMpesaSource']);
Route::post('/send_to_mpesa_destination', [COOPController::class,'postSendToMpesaDestination']);
Route::post('/coop_send_to_mpesa', [COOPController::class,'postSendToMpesa']);

Route::post('/pesalink_to_account_source', [COOPController::class,'postPesaLinkSendToAccountSource']);
Route::post('/pesalink_to_account_destination', [COOPController::class,'postPesaLinkSendToAccountDestination']);
Route::post('/coop_pesalink_to_account', [COOPController::class,'postPesaLinkSendToAccount']);

Route::post('/pesalink_to_phone_source', [COOPController::class,'postPesaLinkSendToPhoneSource']);
Route::post('/pesalink_to_phone_destination', [COOPController::class,'postPesaLinkSendToPhoneDestination']);
Route::post('/coop_pesalink_to_phone', [COOPController::class,'postPesaLinkSendToPhone']);

Route::post('/coop_exchange_rate', [COOPController::class,'postExchangeRate']);
Route::post('/coop_account_validation', [COOPController::class,'postAccountValidation']);



//==============TEST==============
Route::get('/show_send_sms', [TestController::class,'showSendSMS']);
Route::post('/send_sms', [TestController::class,'postSendSMS']);

//===============MOBILE bANKING==================

Route::get('/show_mobile_banking_add_user', [MobileBankingController::class,'showAddUser']);
Route::get('/show_mobile_banking_users', [MobileBankingController::class,'showUsers']);
Route::get('/show_mobile_banking_withdrawal', [MobileBankingController::class,'showWithdrawal']);
Route::get('/show_mobile_banking_deposit', [MobileBankingController::class,'showDeposit']);
Route::get('/show_mobile_banking_fund_transfer', [MobileBankingController::class,'showFundTransfer']);
Route::get('/show_mobile_banking_account_balance', [MobileBankingController::class,'showAccountBalance']);
Route::get('/show_mobile_banking_ministatement', [MobileBankingController::class,'showMinistatement']);
Route::get('/show_mobile_banking_utility_services', [MobileBankingController::class,'showUtilityServices']);
Route::get('/show_mobile_banking_refer_friend', [MobileBankingController::class,'showReferFriend']);

Route::post('/all_members', [MobileBankingController::class,'getAllMembers']);
Route::post('/savings_accounts', [MobileBankingController::class,'getSavingAccounts']);
Route::post('/loan_accounts', [MobileBankingController::class,'getLoanAccounts']);

Route::post('/mobile_banking_add_user', [MobileBankingController::class,'postAddUser']);
Route::post('/mobile_banking_login', [MobileBankingController::class,'postLogin']);
Route::post('/mobile_banking_b2c_callback', [MobileBankingController::class,'postMpesaB2CCallBack']);
Route::post('/mobile_banking_b2b_callback', [MobileBankingController::class,'postMpesaB2BCallBack']);
Route::post('/mobile_banking_withdrawal', [MobileBankingController::class,'postWithdrawal']);
Route::post('/mobile_banking_fund_transfer', [MobileBankingController::class,'postFundTransfer']);
Route::post('/mobile_banking_account_balance', [MobileBankingController::class,'postAccountBalance']);
Route::post('/mobile_banking_ministatement', [MobileBankingController::class,'postMinistatement']);
Route::post('/mobile_banking_utility_services', [MobileBankingController::class,'postUtilityServices']);
Route::post('/mobile_banking_refer_friend', [MobileBankingController::class,'postReferFriend']);





