<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function login(Request $request) {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();

            $token = $request->user()->createToken('api-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'token' => $token,
                'user' => $user,
                'message' => 'Usuário logado com sucesso!'
            ], 201);
        }else {
            return response()->json([
                'status' => false,
                'message' => 'O e-mail ou a senha estão incorretos!'
            ], 404);
        };
    }

    public function logout(User $id) : JsonResponse {
        try {
            $token = PersonalAccessToken::where('tokenable_id', $id)->first();
            if (!$token) {
                return response()->json([
                    'status' => false,
                    'message' => 'Usuário não possui token de acesso.',
                ], 404);
            }

            $id->tokens()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Usuário deslogado com sucesso!',
            ]);

        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Erro ao deslogar usuário!',
                'error' => $e
            ], 500);
        }
    }
}
