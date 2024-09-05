<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index() : JsonResponse {

        $users = User::orderBy('id', 'DESC')->paginate(2);

        return response()->json([
            'status' => true,
            'users' => $users
        ], 200);
    }

    public function show(User $id) : JsonResponse {

        return response()->json([
            'status' => true,
            'user' => $id
        ], 200);
    }

    public function store(UserRequest $request) : JsonResponse {

        DB::beginTransaction();

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Usuário cadastrado com sucesso!',
                'user' => $user
            ], 201);

        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Erro ao cadastrar usuário!',
                'error' => $e->getMessage() // Isso mostrará o erro específico
            ], 400);

        }
    }

    public function update(UserRequest $request, User $id)  : JsonResponse {

        DB::beginTransaction();

        try {

            $id->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);


            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Usuário editado com sucesso!',
                'user' => $id
            ], 200);

        } catch (Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Erro ao editar usuário!',
                'error' => $e->getMessage() // Isso mostrará o erro específico
            ], 400);
        }

        return response()->json([
            'status' => true,
            'message' => 'Usuário editado com sucesso!',
            'user' => $id
        ], 200);
    }

    public function destroy(User $id) : JsonResponse{
        try {

            $id->delete();


            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Usuário deletado com sucesso!',
                'user' => $id
            ], 201);

        } catch (Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Erro ao deletar usuário!',
                'error' => $e->getMessage() // Isso mostrará o erro específico
            ], 400);
        }
    }
}
