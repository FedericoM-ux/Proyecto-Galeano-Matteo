<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = Usuario::with('rol')->get();
    $totalUsuarios = Usuario::count();

    return view(
        'backend.admin.dashboard',
        compact('usuarios', 'totalUsuarios')
    );
    }
}
