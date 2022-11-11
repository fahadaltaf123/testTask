<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface 
{
    public function getAllUsers() 
    {
        return User::all();
    }

    public function getUserById($userId) 
    {
        return User::findOrFail($userId);
    }

    public function getUserByName($userName) 
    {
        return User::where('name', $userName)->firstOrFail();
    }

    public function AuthenticateUser($email, $password){
        if (Hash::check($password, User::select('password')->where('email',$email)->first()->password)) {
            return true;
         } else {
           return false;
         }
    }
    public function deleteUser($userId) 
    {
        User::destroy($userId);
    }

    public function createUser(array $userDetails) 
    {
        return User::create($userDetails);
    }

    public function updateUser($userId, array $newDetails) 
    {
        return User::whereId($userId)->update($newDetails);
    }
}