<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Hash;
use Session;

class UserController extends Controller
{
    public function update($id, UpdateUserRequest $request)
    {
        $user = User::findOrFail($id);
        $requestData = $request->except('password', 'old_password');

        if (!Hash::check($request->input("old_password"), $user->password))    
            return back()->withErrors(['old_password' => 'Girdiğiniz eski şifre hatalıdır!']);
        
        if($request->input("password") != null)
            $requestData["password"] =  bcrypt($request->input('password'));        

        $user->update($requestData);

        return back()->with('success', 'Bilgilerini başarıyla güncellenmiştir!');
    }

}
