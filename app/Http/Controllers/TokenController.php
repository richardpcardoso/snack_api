<?php


namespace App\Http\Controllers;


use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'senha' => 'required']);
        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario) || !Hash::check($request->senha, $usuario->senha)){
            return response()->json('Usuario não encontrado', 401);
        }

        $token = JWT::encode(['email' => $request->email], env('JWT_KEY'));

        return ['access_token' => $token];
    }
}
