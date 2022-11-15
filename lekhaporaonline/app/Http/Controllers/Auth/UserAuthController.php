<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     protected function index()
    {
        return User::all();
    }
//    function login(){
//       return view('auth.login');
//    }
//    function register(){
//       return view('auth.register');
//    }
    //given login and register just returns a view that is not needed here
    //create should be new register
    //check should be new login
    //these two function also needs be come as post request from the web.route
    function create(Request $request){
        //validate Requests
        $request->validate([
         
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12'
        ]);
//        //save user to database
//        $user=new User;
//        $user->name=$request->name;
//        $user->email=$request->email;
//        $user->password=Hash::make($request->password);
//        $query = $user->save();
          
           $ua = $request->header('User-Agent');
           $remember_token = \Illuminate\Support\Str::random(20);
//           $mac_addr = exec('getmac');
           $mac_addr = $_SERVER['REMOTE_ADDR'];
        //save user to database using BD builder
          $query = DB::table('users')
              ->insert([
                  'name'=>$request->name,
                  'email'=>$request->email,
                  'password'=>Hash::make($request->password),
                  'role'=>0,
                  'created_at'=>DB::raw('now()'),
                  'updated_at'=>DB::raw('now()'),
                  'remember_token'=>$remember_token,
                  'user_agent'=>$ua,
                  'mac_addr'=>$mac_addr,
                  
              ]);
        
        
        if($query){
            return back()->with('success','You have been successfully registered');
        }else{
            return back()->with('fail','Something went wrong');
        }
//       return $request->input();
    }
    
    
    function check(Request $request){
//        validate Requests
        $request->validate([
         
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
 
        
             //old way to get user
//           $user= User::where('email','=',$request->email)->first();
        
             //DB builder way to get user 
            $user= DB::table('users')
                ->where('email',$request->email)
                ->first();
         
           if($user){
               if(Hash::check($request->password, $user->password))
               {
                 if($user->role==1)
                 {
                     $request->session()->put('LoggedUser',$user->id);
                     
                     
                     $ip=$request->ip();
                     $mytime = Carbon::now()->toDateTimeString();
//                      echo $mytime->toDateTimeString();
                     $ua = $request->header('User-Agent');
//                     $date = Carbon::createFromFormat('Y-m-d H:i:s', $mytime, 'Europe/Stockholm');
                     
                     $query = DB::table('sessions')
                      ->insert([
                          'id'=>$request->session()->getId(),
                          'user_id'=>$user->id,
                          'ip_address'=>$ip,
                          'user_agent'=>$ua,
                          'payload'=>'default',
                          'last_activity'=>$mytime,
                          

//                          'last_activity'=> $mytime->setTimezone('UTC +6')
                      ]);
                       
                     
                        
                     
                     
                     
                if($query){
//                    dd(Carbon::now()->setTimezone('UTC -6')->toDateTimeString());
//                    return back()->with('success','You have been successfully Logged In');
                    return redirect('admin'); 
                }else{
                    return back()->with('fail','Something went wrong');
                }
                     
                     
                     
                     
                }
                 else
                 {
                      return back()->with('fail','User has not been verified yet');
                 }
                   
               }else{
                   return back()->with('fail','Invalid password');
               }
               
           }else{
               return back()->with('fail','No account found for this email');
           }
        

      return $request->input();
    }
    
    function dashboard(){
        if(session()->has('LoggedUser'))
        {
            $user = User ::where('id','=',session('LoggedUser'))->first();
            $data=[
                "LoggedUserInfo"=>$user
            ];
        }
        return view('admin.dashboard',$data);
    }
    function logout(Request $request){
        if(session()->has('LoggedUser'))
        {
            DB::table('sessions')->delete($request->session()->getId());
            echo "<script>console.log('Debug Objects: " . $request->session()->getId(). "' );</script>";
            session()->pull('LoggedUser');
            return redirect('/');
        }
    }
}
