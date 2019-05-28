<?php

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->input('email'))->first();

        if(Hash::check($request->input('password'), $user->password))
        {
            $apiKey = base64_encode(Str::random(40));
            User::where('email', $request->input('email'))->update(['api_key' => "$apiKey"]);;
            return response()->json(['status' => 'success','api_key' => $apiKey]);
        }
        else
        {
            return response()->json(['status' => 'fail'],401);
        }
    }
}