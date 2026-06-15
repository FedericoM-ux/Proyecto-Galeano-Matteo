<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Retornamos la vista en la ruta física configurada por la cátedra
        return view('backend.admin.dashboard');
    }
}
