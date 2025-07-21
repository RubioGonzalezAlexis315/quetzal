<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cli_cliente_info;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function mostrarLogin()
    {
        return view('cliente.login');
    }

    public function procesarLogin(Request $request)
    {
        $cliente = cli_cliente_info::where('CL_Email', $request->correo)->first();

        if ($cliente && Hash::check($request->password, $cliente->CL_Password)) {
            session(['cliente' => $cliente]);
            return redirect()->route('tienda.index');
        }

        return back()->with('error', 'Correo o contraseña incorrectos.');
    }

    public function mostrarRegistro()
    {
        return view('cliente.registro');
    }

    public function procesarRegistro(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:cli_cliente_info,CL_Email',
            'password' => 'required|min:6',
        ]);

        $cliente = new cli_cliente_info();
        $cliente->CL_Nombre = $request->nombre;
        $cliente->CL_Email = $request->correo;
        $cliente->CL_Password = Hash::make($request->password);
        $cliente->save();

        session(['cliente' => $cliente]);

        return redirect()->route('tienda.index');
    }

    public function logout()
    {
        session()->forget('cliente');
        return redirect()->route('tienda.index');
    }
}
