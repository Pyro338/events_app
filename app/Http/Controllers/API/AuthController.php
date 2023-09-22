<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8'],
            'device_name' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input             = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user              = User::create($input);

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'error'  => null,
            'result' => [
                'id'         => $user->id,
                'first_name' => $user->name,
                'last_name'  => $user->last_name,
                'token'      => $token
            ]
        ], 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'       => ['required', 'string', 'email', 'max:255'],
            'password'    => ['required', 'string', 'min:8'],
            'device_name' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::user()->id);

            return response()->json([
                'error'  => null,
                'result' => [
                    'id'         => $user->id,
                    'first_name' => $user->name,
                    'last_name'  => $user->last_name,
                    'token'      => $user->createToken($request->device_name)->plainTextToken
                ]
            ], 200);
        } else {
            return response()->json(['error' => 'Wrong credentials'], 401);
        }
    }

    public function token(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'       => ['required', 'string', 'email', 'max:255'],
            'password'    => ['required', 'string', 'min:8'],
            'device_name' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
        }

        return response()->json([
            'error'  => null,
            'result' => [
                'id'         => $user->id,
                'first_name' => $user->name,
                'last_name'  => $user->last_name,
                'token'      => $user->createToken($request->device_name)->plainTextToken
            ]
        ], 200);
    }
}
