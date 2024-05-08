<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // Método para mostrar todos los usuarios
    public function index()
    {
        return User::all();
    }

    // Método para registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['user' => $user], 201);
    }

    // Método para iniciar sesión
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json(['user' => $user], 200);
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
    }

    // Método para mostrar un usuario específico
    public function show(User $user)
    {
        return $user;
    }

    // Método para actualizar un usuario
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 200);
    }

    // Método para eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
