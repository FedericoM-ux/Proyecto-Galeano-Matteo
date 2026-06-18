<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Http\Requests\ContactoRequest;

class ContactoController extends Controller
{
    public function store(ContactoRequest $request)
    {
        $datos = $request->validated();

        Consulta::create($datos);

        return redirect()->back()->with(
            'success_message',
            'Tu consulta ha sido enviada correctamente'
        );
    }
}
