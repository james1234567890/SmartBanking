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
class AdminController extends Controller
{
   
    public function showAddCompany()
    {
        return view('add_company');
    }
     public function showPermissions()
    {
        return view('permissions');
    }
  
    public function postCompany(Request $request)
    {  
        $input = $request->all();
        $companyname=$request->input('companyname');
        $displayname=$request->input('displayname');
        $postaladdress=$request->input('postaladdress');
        $physicaladdress=$request->input('physicaladdress');
        $emailaddress=$request->input('emailaddress');
        $phoneno=preg_replace("/^0/", "254",$request->input('phoneno'));
        $pinno=$request->input('pinno');
    
        if ($file = $request->file('picture')) {
            $picturename =  rand().'.'.$file->getClientOriginalExtension();
            $file->storeAs('picture', $picturename,'public');
        }

        DB::insert('insert into company(company_name,display_name,postal_address,physical_address,email_address,phone_no,pin_no,picture_name)
                    values(?,?,?,?,?,?,?,?)',[$companyname,$displayname,$postaladdress,$physicaladdress,$emailaddress,$phoneno,$pinno,$picturename]);
       // return response()->json('Ajax request submitted successfully'.$fileName.$companyname);
       return response()->json(['success'=>'Ajax request submitted successfully']);
     
    }
    function showCompany(){
        $company = DB::select('select * from company');
        return view('company',['company'=>$company]);
    }
   
    public function getCompanyPicture($filename)
    {
        $path = storage_path('app/picture/'. $filename);
        if (!File::exists($path)) {
            abort(404);
        }else{
            echo 'exist';
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    
    }
 }
?>