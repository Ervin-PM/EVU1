<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Logout de usuario
    public function logout(Request $request)
    {
        // Elimina el token de la sesión (si se usa)
        $request->session()->forget('jwt_token');
        // Si usas Auth::logout() para sesiones tradicionales, puedes agregarlo aquí
        // Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Mostrar formulario de registro
    public function showRegisterForm()
    {
        return view('register');
    }

    // Registro de usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Si la petición es web, redirige a login
        if (!$request->expectsJson()) {
            return redirect()->route('login')->with('success', 'Usuario registrado correctamente. Inicia sesión.');
        }

        // Si es API, responde JSON
        return response()->json(['message' => 'Usuario registrado con éxito', 'user' => $user], 201);
    }

    // Login de usuario
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
            // Si es web, redirige con error
            if (!$request->expectsJson()) {
                return redirect()->back()->withErrors(['message' => 'Datos inválidos']);
            }
            // Si es API, responde JSON
            return response()->json(['message' => 'Datos inválidos'], 401);
        }

        // Si es web, redirige a proyectos
        if (!$request->expectsJson()) {
            session(['jwt_token' => $token]);
            return redirect()->route('proyectos.index');
        }

        // Si es API, responde JSON
        return response()->json(['token' => $token], 200);
    }
}
