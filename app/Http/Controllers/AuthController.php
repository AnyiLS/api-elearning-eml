<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\{DB, Hash};

class AuthController extends Controller
{
    /**
     * Este tipo de funciones usualmente se utiliza en peticiones get.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $status = false;
        $result = null;
        DB::beginTransaction();
        try {
            $user =  Usuario::create([
                'nombre_usuario' => $request->name,
                'apellido_usuario' => $request->last_name,
                'correo_usuario' => $request->email,
                'contraseña_usuario' => Hash::make($request->password),
                'telefono_usuario' => $request->phone,
                'CARGO_ID' => $request->position,
                'ROL_ID' => $request->role
            ]);

            $status = true;
            DB::commit();
        } catch (\Throwable $th) {
            $result = $th->getMessage();
            DB::rollBack();
        }

        if ($status) {
            return response()->json(array("transaction" => array("status" => $status), "data" => $user), 200);
        } else {
            return response()->json(array("transaction" => array("status" => $status), "data" => $result), 500);
        }
    }
}
