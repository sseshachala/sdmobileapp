<?php

namespace App\Http\Controllers\sdmobileapp;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\sdmobileapp\helpers\SMSHelper;

class UserController extends Controller
{
    private $salt;
    public function __construct()
    {
        $this->salt="userloginregister";
    }
    public function login(Request $request)
    {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        if ($request->has('username') && $request->has('password')) {
            $user = User:: where("username", "=", $request->input('username'))
                ->where("password", "=", sha1($this->salt.$request->input('password')))
                ->first();
            if ($user) {
                $token=str_random(60);
                $user->api_token=$token;
                $user->name=$request->input('name');;
                $user->save();
                $device_token = $request->input('device_token');
                $this->saveDeviceToken($user, $device_token);
                return response()->json(["status"=> true, 'message'=> "Login successful", "user" => $user], 200, $header, JSON_UNESCAPED_UNICODE);
                //return $user->api_token;
            } else {
                return response()->json(["status"=> false, 'message'=> "Login Failed Due to Incorrect credentials"], 200, $header, JSON_UNESCAPED_UNICODE);
                //return "用户名或密码不正确，登录失败！";
            }
        } else {
            return response()->json(["status"=> false, 'message'=> "Login Failed Due to Incorrect credentials"], 200, $header, JSON_UNESCAPED_UNICODE);
        }
    }
    public function register(Request $request) {
        $header = array (
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        );

        if ($request->has('username') && $request->has('password') && $request->has('email') && $request->has('phone')) {
            $user = new User;
            $user->username=$request->input('username');
            $user->name=$request->input('name');
            $user->phone=$request->input('phone');
            $user->password=sha1($this->salt.$request->input('password'));
            $user->email=$request->input('email');
            $user->api_token=str_random(60);
            $device_token = $request->input('device_token');
            $user->location = $request->input('location');
            if($user->save()) {
                $this->saveDeviceToken($user, $device_token);
                return response()->json(["status"=> true, 'message'=> "User Registration Successful"], 200, $header, JSON_UNESCAPED_UNICODE);
            } else {
                return response()->json(["status"=> false, 'message'=> "User Registration Failed"], 200, $header, JSON_UNESCAPED_UNICODE);
            }
        } else {
            return response()->json(["status"=> false, 'message'=> "User Registration Failed, not all parameters sent!"], 200, $header, JSON_UNESCAPED_UNICODE);
        }
    }
    public function info(){
        return Auth::user();
    }

    public function saveDeviceToken($user, $device_token)
    {
        $userDevice = UserDevice:: where("user_id", "=", $user->id)
            ->where("deivce_token", "=", $device_token)
            ->first();
        if(!$userDevice)
        {
            $userDevice = new UserDevice();
            $userDevice->user_id = $user->id;
            $userDevice->device_token = $device_token;
            $userDevice->save();

        }
    }

    public function
}