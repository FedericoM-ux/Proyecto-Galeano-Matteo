formularioRegistro(){

}

class AuthControllerphp extends Controller{
    public function formularioRegistro(){
        return view('backend.usuarios.registro');
    }

    public function formularioLogin(){
        return view('backend.usuarios.login');
    }
}

public function registrar(Request $request){
    $request->validate([
        'name' => 'required|string|max:225',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ])
}

public function autenticar(Request $request){
$credenciales = $request->validate([ 'email' => 'required|email’,
'password' => 'required' ]);

if(Auth::attempt($credenciales)){
 $request->session()->regenerate();
if(Auth::user()->rol === 'admin’){
 return redirect('/admin’);
}
return redirect('/cliente'); // si no es admin, es cliente }
// Si las credenciales son incorrectas, vuelve al login con error
return back()->withErrors([ 'email' => 'Email o contraseña incorrectos' ]);
}

public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}