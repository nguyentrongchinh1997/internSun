<?php  

namespace App\Http\Service\client;

use App\User;

class UserService
{
    public function create($inputs)
    {
        return User::create([
            'name' => $inputs['full_name'],
            'email' => $inputs['email'],
            'level' =>0,
            'balance' =>0,
            'password' =>bcrypt($inputs['password']),
        ]);
    }
}