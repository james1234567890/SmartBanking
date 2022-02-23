<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use DB;
use Storage;
class UserController extends Controller
{
    public function showLogin(){
        return view('login');
    }  
  
    public function getUser($id){
        $user['data']= DB::select('select * from user where id = ?',[$id]);
        return response()->json($user);
    }
    public function getUsers(){
        $user['data']= DB::select('select * from user');
        return response()->json($user);
    } 
    public function showAddUser()
    {   
        //$request->session()->forget('register');compact('companyname','displayname','picturename')
        return view('add_user');
    }
    public function showDashboard()
    {   //$company = DB::select('select * from company');
        return view('dashboard');
    }
  
    function showUsers(){
        $users = DB::select('select * from user');
        return view('users',['users'=>$users]);
    }
    
    public function postUserLogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
          
            return Redirect::to("show_dashboard");
        }
        return Redirect::to("login")->with('error', 'You have entered wrong credentials');
    }
 
 
    public function postUserGeneral(Request $request){
      
       $input = $request->all();
       $fileName="";
       
       $request->session()->put('surname', $request->input('surname'));
       $request->session()->put('firstname', $request->input('firstname')); 
       $request->session()->put('lastname', $request->input('lastname'));
       $request->session()->put('nationalid', $request->input('nationalid')); 
       $request->session()->put('hudumano', $request->input('hudumano'));
       $request->session()->put('passportno', $request->input('passportno')); 
       $request->session()->put('gender', $request->input('gender'));
       $request->session()->put('nationality', $request->input('nationality')); 
       $request->session()->put('dob', $request->input('dob'));
       $request->session()->put('pinno', $request->input('pinno'));
       
       if ($file = $request->file('picture')) {
            $picturename =  rand().'.'.$file->getClientOriginalExtension();
            $file->storeAs('temporary', $picturename,'public');
        }
       $request->session()->put('picturename', $picturename);

      // return response()->json(['success'=>'Ajax request submitted successfully'.$picturename]);
    }
    public function postUserCommunication(Request $request){
      
       //$input = $request->all();
      
       $request->session()->put('phoneno', $request->input('phoneno'));
       $request->session()->put('phoneno2', $request->input('phoneno2')); 
       $request->session()->put('emailaddress', $request->input('emailaddress'));
       $request->session()->put('postaladdress', $request->input('postaladdress')); 
       $request->session()->put('physicaladdress', $request->input('physicaladdress')); 
       $request->session()->put('currentresidence', $request->input('currentresidence')); 
       
       //return response()->json(['success'=>'Ajax request submitted successfully'.$request->session()->get('surname')]);
    }
    public function postUserSecurity(Request $request){
      
       //$input = $request->all();
    
       $request->session()->put('username',$request->input('username'));
       $request->session()->put('password',$request->input('password')); 
       //return response()->json(['success'=>'Ajax request submitted successfully'.$request->session()->get('phoneno2')]);
    }
    
    public function postUserRegister(Request $request)
    {  
     
       $surname=$request->session()->get('surname');
       $firstname =$request->session()->get('firstname');
       $lastname = $request->session()->get('lastname');
       $nationalid =$request->session()->get('nationalid');
       $hudumano = $request->session()->get('hudumano');
       $passportno= $request->session()->get('passportno');
       $gender =$request->session()->get('gender');
       $nationality =$request->session()->get('nationality');
       $dob =$request->session()->get('dob');
       $pinno =$request->session()->get('pinno');
       $phoneno=preg_replace("/^0/", "254", $request->session()->get('phoneno'));
       $phoneno2 =preg_replace("/^0/", "254", $request->session()->get('phoneno2'));
       $emailaddress =$request->session()->get('emailaddress');
       $postaladdress =$request->session()->get('postaladdress');
       $physicaladdress =$request->session()->get('physicaladdress');
       $currentresidence =$request->session()->get('currentresidence');
       $username =$request->session()->get('username');
       $password =Hash::make($request->session()->get('password'));
       $picturename=$request->session()->get('picturename');
       Storage::move('public/temporary/'.$picturename, 'public/picture/'.$picturename);

        DB::insert('insert into user(sur_name,first_name,last_name,national_id,huduma_no,passport_no,gender,nationality,date_of_birth,pin_no,phone_no,
        phone2_no,email_address,postal_address,physical_address,current_residence,username,password,picture_name)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$surname,$firstname,$lastname,$nationalid,$hudumano,$passportno,$gender,
        $nationality,$dob,$pinno,$phoneno,$phoneno2,$emailaddress,$postaladdress,$physicaladdress,$currentresidence,$username,$password,$picturename]);
        
       return response()->json(['success'=>'Ajax request submitted successfully'.$request->session()->get('phoneno2')]);
       
       //return Redirect::to("users");
       //return redirect('/users');
    }
     
    public function editUser($id) {
        $user = DB::select('select * from user where id = ?',[$id]);
        return view('register_user',['users'=>$user]);
      
    }
  
     
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/show_login');
    }
 }
?>