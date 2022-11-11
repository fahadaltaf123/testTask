<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\User;

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