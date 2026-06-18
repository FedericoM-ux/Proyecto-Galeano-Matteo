<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VentaCabecera;
use App\Models\VentaDetalle;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
    // with('rol') carga la relación y evita el problema de consultas N+1
    $usuarios = Usuario::with('rol')->get();
    return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
    $roles = Rol::all(); // necesario para el <select> del formulario
    return view('usuarios.create', compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
 $request->validate([
 'nombre' => 'required|string|max:100',
 'email' => 'required|email|unique:usuarios',
 'password' => 'required|min:6|confirmed', // busca campo password_confirmation
 'rol_id' => 'required|exists:roles,id',
 ]);
 Usuario::create($request->only(['nombre', 'email', 'password', 'rol_id']));
 return redirect()->route('admin.dashboard')->with('success', 'Usuario registrado.');
}


    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }
public function detalles()
{
    return $this->hasMany(VentaDetalle::class);
}
    /**
     * Show the form for editing the specified resource.
     */
    public function editCuenta()
{
    $usuario = Auth::user();
    return view('backend.usuarios.modificarCuenta', compact('usuario'));
}
    
public function updateCuenta(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'email' => 'required|email',
    ]);

    $usuario = Auth::user();

    $usuario->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
    ]);

    return back()->with('success', 'Cuenta actualizada correctamente');
}

public function compras()
{
    $usuario = Auth::user();

    $compras = VentaCabecera::where('user_id', $usuario->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('backend.usuarios.compras', compact('compras'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update([
        'nombre' => $request->nombre,
        'email' => $request->email,
    ]);

    return redirect()->route('cuenta.edit')
        ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario) {
        $usuario->forceDelete(); // borrado lógico
        return redirect()->route('admin.dashboard')->with('success', 'Usuario dado de baja.');
    }
}
