<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController
{
    public function login(Request $request)
    {
        $user = User::query()
            ->firstWhere('phone', $request->get('phone'));

        if (!$user) {
            $user = $this->registerUser($request->get('phone'));
        }

        $authCode = mt_rand(000000, 999999);

        $user->update([
            'auth_code' => $authCode
        ]);

        return response()->json([
            'message' => 'Код подтверждения успешно отправлен'
        ]);
    }

    public function checkAuthCode(Request $request)
    {
        $user = User::firstWhere('phone', $request->get('phone'));

        if ($user->auth_code === $request->get('auth_code')) {
            $token = $user
                ->createToken('auth')
                ->plainTextToken;

            return response()->json([
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Пользователь с таким номером телефоном не найден'
        ]);
    }

    private function registerUser(string $phone): User
    {
        return User::create([
            'name' => 'Default',
            'email' => 'Default@default.ru',
            'phone' => $phone
        ]);
    }
}
