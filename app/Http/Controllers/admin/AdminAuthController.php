<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\usu_administrador;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'AD_Correo' => 'required|email',
            'AD_Contraseña' => 'required|string',
        ]);

        $admin = usu_administrador::where('AD_Correo', $request->AD_Correo)->first();

        if ($admin && Hash::check($request->AD_Contraseña, $admin->AD_Contraseña)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['AD_Correo' => 'Contraseña incorrecta.'])->withInput();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Sesión cerrada.');
    }
}
