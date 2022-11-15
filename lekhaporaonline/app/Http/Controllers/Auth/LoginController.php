<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
//        $this->middleware('guest');
    }
    
    public function login(Request $request)
    {
        
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
//          
//          $email_check = DB::select("select * from users where email='".$request->email."'");
//         Redirect::to('/admin');
//         dd($email_check);
//
//         $pass_check = ("SELECT * FROM `users` WHERE password=\'".$request->password."\';");
//          dd($pass_check);



           $users = DB::table('users')->get();
           $curr_user=new User();
           $flag=0;
           foreach ($users as $user) {
                if($request->email===$user->email && (Hash::check($request->password, $user->password))&&($user->role===1))
                {
//                    dd($user);
                    echo "Verified";
                    $curr_user=$user;
                    Session::forget('user');
                    session()->regenerate();
                    Session::push('users', $curr_user);
                    $session_data = Session::all();

                    dd($session_data);
                    return redirect('/admin');
                }
                elseif(($request->email===$user->email) && (Hash::check($request->password,$user->password))&&($user->role===0)){
                   
//                    return redirect('/');
                    echo "Registered but unverified";
                }
               else{
                   
//                   dd("Not Registered");
//                   return redirect('/');
                   echo "Not Registered";
               }
            }
           $data =\Illuminate\Support\Facades\Session::all();
           dd($data);
           dd($curr_user);

//          $query2 = DB::select("select * from users where email=".$request->email." and password="+$request->password);
//          dd($query2);
//          $query2 = DB::select("select * from users where email="+strval($request->email)+" and password="+$request->password+" and role="+1);
          
//          if($query1 && $query2){
//              echo("Verified");
//              $redirectTo = '/admin';
//          }
//          elseif($query1 && !query2){
//              echo("Not Verified");
//          }
//          else{
//              echo("Not Registered");
//          }
//          $curr_user=new User;
//          $curr_user->email=$request->email;
//          $curr_user->password=$request->password;
//           echo($email_check);
//          if(($curr_user->password===$request->password)&&($curr_user->role==1)){
//              $redirectTo = '/admin';
//          }
//          elseif(($curr_user->password===$request->password)&&($curr_user->role!==1)){
//              echo("Not Verified Admin");
//          }
//          else{
//            echo("Not Authenticated");
//           }

    }
}
