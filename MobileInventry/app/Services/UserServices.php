<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class UserServices {

    public function addUser( Request $request)
    {
        log::info("trying to add user with $request");

        $user = new User;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $data = array('username' => $user->username, 'phone' => $user->phone, 'email' =>  $user->email);
        return DB::table('users')->insert($data);
    }

    public function getUserByEmail($email){
        log::info("get user $email info");

        return DB::table('users')->where('email',$email)->first();
    }

    public function getUserByUsername($username){
        log::info("get user $username info");

        return DB::table('users')->where('username',$username)->first();
    }

    public function getUserByPhone($phone){
        log::info("get user $phone info");

        return DB::table('users')->where('phone',$phone)->first();
    }

    public function getAllUsers(){
        log::info("get users info");

        return DB::table('users')->select('username','phone')->get();
    }


    public function deleteUserByUsername( $username){
        log::info("delete user $username info");

        $user =  $this->getUserByUsername($username);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

    public function deleteUserByEmail( $email){
        log::info("delete user $email info");

        $user =  $this->getUserByEmail($email);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

    public function deleteUserByPhone( $phone){
        log::info("delete user $phone info");

        $user =  $this->getUserByPhone($phone);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

}
