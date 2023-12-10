<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $requestData = $request->only('name', 'password');
        
        $auth = auth()->user();
        $auth->name = $requestData['name'];
        if (!empty($requestData['password'])) {
            $auth->password = Hash::make($requestData['password']);
        }
        $auth->save();
        session()->flash('success', 'Profile berhasil diubah');
        return redirect()->back();
    }
}
