<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use Session;
use DB;
class FinanceController extends Controller
{
   
    public function showAddVendor()
    {
        return view('add_vendor');
    }
     public function showAddBankAccount()
    {
        return view('add_bank_account');
    }
    public function showVendors()
    {
        $vendors = DB::select('select * from vendor');
        return view('vendors',['vendors'=>$vendors]);
    }
    public function getVendor($id){
        $vendor['data']= DB::select('select * from vendor where id = ?',[$id]);
        return response()->json($vendor);
    }
    public function getVendors(){
        $vendor['data']= DB::select('select * from vendor');
        return response()->json($vendor);
    }
     public function showBankAccounts()
    {
        $bankaccounts = DB::select('select * from bank_account');
        return view('bank_accounts',['bankaccounts'=>$bankaccounts]);
    }
    public function getBankAccount($id){
        $bankaccount['data']= DB::select('select * from bank_account where id = ?',[$id]);
        return response()->json($bankaccount);
    }
    public function postVendorGeneral(Request $request){
      
       $input = $request->all();
       $fileName="";
       
       $request->session()->put('vendorname', $request->input('vendorname'));
       $request->session()->put('bankaccountno', $request->input('bankaccountno')); 
       $request->session()->put('bankaccountno2', $request->input('bankaccountno2'));
       $request->session()->put('country', $request->input('country')); 
       $request->session()->put('pinno', $request->input('pinno'));
       
       if ($file = $request->file('picture')) {
            $picturename =  rand().'.'.$file->getClientOriginalExtension();
            $file->storeAs('temporary', $picturename,'public');
        }
       $request->session()->put('picturename', $picturename);

       //return response()->json(['success'=>'Ajax request submitted successfully'.$picturename]);
    }
    public function postVendorCommunication(Request $request){
      
       //$input = $request->all();
      
       $request->session()->put('phoneno', $request->input('phoneno'));
       $request->session()->put('phoneno2', $request->input('phoneno2')); 
       $request->session()->put('emailaddress', $request->input('emailaddress'));
       $request->session()->put('postaladdress', $request->input('postaladdress')); 
       $request->session()->put('physicaladdress', $request->input('physicaladdress')); 
       $request->session()->put('website', $request->input('website')); 
       
    }
    public function postVendorInvoicing(Request $request){
      
       //$input = $request->all();
    
       $request->session()->put('vendorpostinggroup',$request->input('vendorpostinggroup'));
       $request->session()->put('vatpostinggroup',$request->input('vatpostinggroup'));
       $request->session()->put('wtaxpostinggroup',$request->input('wtaxpostinggroup'));
       $request->session()->put('paymentmethod',$request->input('paymentmethod'));
       
    }
    
    public function postVendorRegister(Request $request){  
     
       $vendorname=$request->session()->get('vendorname');
       $bankaccountno =$request->session()->get('bankaccountno');
       $bankaccountno2 = $request->session()->get('bankaccountno2');
       $pinno =$request->session()->get('pinno');
       $country =$request->session()->get('country');
       $phoneno=preg_replace("/^0/", "254", $request->session()->get('phoneno'));
       $phoneno2 =preg_replace("/^0/", "254", $request->session()->get('phoneno2')); 
       $postaladdress =$request->session()->get('postaladdress');
       $physicaladdress =$request->session()->get('physicaladdress');
       $emailaddress =$request->session()->get('emailaddress');
       $website =$request->session()->get('website');
       $vendorpostinggroup =$request->session()->get('vendorpostinggroup');
       $vatpostinggroup =$request->session()->get('vatpostinggroup');
       $wtaxpostinggroup =$request->session()->get('wtaxpostinggroup');
       $paymentmethod=$request->session()->get('paymentmethod');
       $picturename=$request->session()->get('picturename');
       Storage::move('public/temporary/'.$picturename, 'public/picture/'.$picturename);

        DB::insert('insert into vendor(vendor_name,bank_account_no,bank_account_no2,pin_no,country,phone_no,phone_no2,postal_address,physical_address,
                    email_address,website,vendor_posting_group,vat_posting_group,wtax_posting_group,payment_method,picture_name)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$vendorname,$bankaccountno,$bankaccountno2,$pinno,$country,$phoneno,$phoneno2,$postaladdress,
        $physicaladdress,$emailaddress,$website,$vendorpostinggroup,$vatpostinggroup,$wtaxpostinggroup,$paymentmethod,$picturename]);
        
       return response()->json(['success'=>'Ajax request submitted successfully']);
     
    }
    
     public function postBankAccountGeneral(Request $request){
    
       $request->session()->put('bankaccounttype', $request->input('bankaccounttype'));
       $request->session()->put('bankaccountname', $request->input('bankaccountname'));
       $request->session()->put('bankaccountno', $request->input('bankaccountno')); 
       $request->session()->put('bankcode', $request->bankcode);
       $request->session()->put('bankname', $request->bankname); 
    
    }
    public function postBankAccountCommunication(Request $request){
       $request->session()->put('phoneno', $request->input('phoneno'));
       $request->session()->put('phoneno2', $request->input('phoneno2')); 
       $request->session()->put('emailaddress', $request->input('emailaddress'));
       $request->session()->put('postaladdress', $request->input('postaladdress')); 
       $request->session()->put('physicaladdress', $request->input('physicaladdress')); 
       $request->session()->put('website', $request->input('website')); 
           }
    public function postBankAccountPosting(Request $request){
       $request->session()->put('bankpostinggroup',$request->input('bankpostinggroup'));
    }
    
    public function postBankAccountRegister(Request $request){ 
        
       $bankaccounttype=$request->session()->get('bankaccounttype');
       $bankaccountname=$request->session()->get('bankaccountname');
       $bankaccountno =$request->session()->get('bankaccountno');
       $bankcode =$request->session()->get('bankcode');
       $bankname =$request->session()->get('bankname');
       $phoneno=preg_replace("/^0/", "254", $request->session()->get('phoneno'));
       $phoneno2 =preg_replace("/^0/", "254", $request->session()->get('phoneno2')); 
       $postaladdress =$request->session()->get('postaladdress');
       $physicaladdress =$request->session()->get('physicaladdress');
       $emailaddress =$request->session()->get('emailaddress');
       $website =$request->session()->get('website');
       $bankpostinggroup =$request->session()->get('bankpostinggroup');
     
        DB::insert('insert into bank_account(bank_account_type,bank_account_name,bank_account_no,bank_code,bank_name,phone_no,phone_no2,postal_address,physical_address,
                    email_address,website,bank_posting_group)
        values(?,?,?,?,?,?,?,?,?,?,?,?)',[$bankaccounttype,$bankaccountname,$bankaccountno,$bankcode,$bankname,$phoneno,$phoneno2,$postaladdress,
        $physicaladdress,$emailaddress,$website,$bankpostinggroup]);
        
       return response()->json(['success'=>'Ajax request submitted successfully']);
    
    }
     
    public function editUser($id) {
        $user = DB::select('select * from user where id = ?',[$id]);
        return view('register_user',['users'=>$user]);
      
    }
    function getCompanyInfo(){
        $companyinfo = DB::select('select * from company_information');
        return view('companyinfo',['companyinfo'=>$companyinfo]);
    }
   
    public function getPicture($filename)
    {
        $path = storage_path('app/public/picture/'. $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    
    }
 }
?>