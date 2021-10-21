<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8'
        ]);

        if ($credentials) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'userType' => $request->userType,
            ]);
            // ポストした値が正常な場合のレスポンス
            return response()->json(['created' => true], Response::HTTP_OK);
        }
        return response()->json(['message' => '登録に失敗しました。'], 422);
    }
}
