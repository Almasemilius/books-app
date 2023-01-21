<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postUser(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'passwordConfirm' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $passwordConfirm = $request->passwordConfirm;
        if ($password === $passwordConfirm) {
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            return response()->json($user);
        } else {
            return response()->json(['error' => "Passwords do not match"], 500);
        }
    }

    public function getUsers(Request $request)
    {
        $limit = $request->limit;
        $data = User::query();

        $data = $data->paginate($limit ? $limit : 25);

        return response()->json($data);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'password' => 'required',
            'email' => 'required|email',
        ]);
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        if ($user) {
            $passwordCheck = Hash::check($password, $user->password);
            if ($passwordCheck) {
                $token = $user->createToken('login');
                $data = ['token' => $token, 'user' => $user];

                return response()->json($data);
            } else {
                return response()->json(['error' => "Incorrect Password"], 500);
            }
        } else {
            return response()->json(['error' => "User Not found"], 500);
        }
    }

    public function logout(Request $request)
    {
        $userId = $request->userId;
        $user = User::find($userId);
        if ($user) {
            $user->tokens()->delete();
            return response()->json("Logged Out");
        } else {
            return response()->json(['error' => "User Not found"], 500);
        }
    }
}
