<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use function MongoDB\BSON\toJSON;


class UserServices {

    public function addUser( Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $data = array('username' => $user->username, 'phone' => $user->phone, 'email' =>  $user->email);
        return DB::table('users')->insert($data);
    }

    public function getUserByEmail($email){
        return DB::table('users')->where('email',$email)->first();
    }

    public function getUserByUsername($username){
        return DB::table('users')->where('username',$username)->first();
    }

    public function getUserByPhone($phone){
        return DB::table('users')->where('phone',$phone)->first();
    }

    public function getAllUsers(){
        return DB::table('users')->select('username','phone')->get();
    }


    public function deleteUserByUsername( $username){
        $user =  $this->getUserByUsername($username);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

    public function deleteUserByEmail( $email){
        $user =  $this->getUserByEmail($email);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

    public function deleteUserByPhone( $phone){
        $user =  $this->getUserByPhone($phone);
        if($user == null)return 0;
        $user= json_decode( json_encode($user), true);
        return DB::table('users')->delete($user);
    }

}
