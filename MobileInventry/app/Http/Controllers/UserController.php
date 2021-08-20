<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    protected  $userService;

    /**
     * constructor for user service
     */
    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    /**
     * add all users from database using validator
     */
    public function addUser(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|distinct|max:255',
            'phone' => 'required|digits:10|distinct',
            'email' => 'email:rfc,dns',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), ResponseAlias::HTTP_BAD_REQUEST);
        }

        try {
            $this->userService->addUser($request);
        }
        catch (QueryException $e){
            return response()->json($e->errorInfo, ResponseAlias::HTTP_BAD_REQUEST);
        }

        return response()->json([
            "message" => "User record $request->username created"
        ], 201);
    }

    /**
     * get all users from database using username
     */
    public function getUsersByUsername($username): JsonResponse
    {
        $user = $this->userService->getUserByUsername($username);
        if($user != null){
            return response()->json($user);
        }else {
            return response()->json(['message' => "User not found"], 404);
        }
    }

    /**
     * get all users from database using email
     */
    public function getUsersByEmail($email): JsonResponse
    {
        $user = $this->userService->getUserByEmail($email);
        if($user != null){
        return response()->json($user);
        }else {
            return response()->json(['message' => "User not found"], 404);
        }
    }

    /**
     *  get all users from database using phone
     */
    public function getUsersByPhone($phone): JsonResponse
    {
        $user = $this->userService->getUserByPhone($phone);
        if($user != null){
            return response()->json($user);
        }else {
            return response()->json(['message' => "User not found"], 404);
        }
    }


    /**
     *  get all users in database
     */
    public function getAllUsers(): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        if($users == null){
            return response()->json(['message' => "User not found"], 404);
        }
        return response()->Json($users);
    }

    /**
     * remove users by username
     */
    public function removeUsersByUsername($username): JsonResponse
    {
        if($this->userService->deleteUserByUsername($username)==null){
            return response()->json(['message' => "task with $username does not exist"],404);
        }

        return response()->json([
            "message" => "task wit $username is successfully deleted!"
        ]);
    }

    /**
     *  remove users by email
     *
     */
    public function removeUsersByEmail($email): JsonResponse
    {
        if($this->userService->deleteUserByEmail($email)==null){
            return response()->json(['message' => "task with $email does not exist"],404);
        }

        return response()->json([
            "message" => "task wit $email is successfully deleted!"
        ]);
    }

    /**
     * remove users by phone
     */
    public function removeUsersByPhone($phone): JsonResponse
    {
        if($this->userService->deleteUserByPhone($phone)==null){
            return response()->json(['message' => "task with $phone does not exist"],404);
        }

        return response()->json([
            "message" => "task wit $phone is successfully deleted!"
        ]);
    }
}
