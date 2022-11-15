<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|string|max:255',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6|confirmed',
//        ]);
//    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $request->validate([
         
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            
        ]);
//        //save user to database
//        $user=new User;
//        $user->name=$request->name;
//        $user->email=$request->email;
//        $user->password=Hash::make($request->password);
//        $query = $user->save();
          
        $curr_time = Carbon::now()->toDateTimeString();
        $ua = $request->header('User-Agent');
        $mac_addr = substr(shell_exec('getmac'),157,20);
        $ip_addr = request()->ip();
        $remember_token = \Illuminate\Support\Str::random(20);
//        $date = Carbon::createFromFormat('Y-m-d H:i:s', $$currTime, 'Europe/Stockholm');            
        //save user to database using DB builder
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
//            return back()->with('success','You have been successfully registered');
            echo('success You have been successfully registered');
        }else{
//            return back()->with('fail','Something went wrong');
             echo('fail Something went wrong');
        }
    }
    
    
    protected function admin_verify(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role=1;
        $user->update($request->all());

        return $article;
    }
    protected function index()
    {
        return User::all();
    }
    
}
