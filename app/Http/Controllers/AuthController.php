<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index(){
        
        return view('home' );
    }

    public function login(){

        return view('login' );
    }

    public function loginSubmit(Request $request){
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:8',
        ],
        //esse segundo array é para armazernar o retorno das mensagens
[
            'email.required' => ' O email é Obrigatorio!',
            'password.required' => ' A Senha é Obrigatorio!',
            'password.min' => ' Senha tem que ter mais no minimo :min digitos!'
        ]);
        //salva oq foi enviado no input e validado
        $email = $validated['email'];
        $password = $validated['password'];

        $user = User::where('email',$email)
                    ->where('deleted_at',null)
                    ->first();
        //checa se o usuario existe
        if(!$user){
            return
            redirect()
            ->back()
            ->withInput($request->except('password'))
            ->with('loginError','Email ou senha incorretos');
        }
        //checa a senha
        if(!password_verify($password,$user->password)){
            return
            redirect()
            ->back()
            ->withInput($request->except('password'))
            ->with('loginError','Email ou senha incorretos');
        }

        //fazer a função last_login

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user inserir um um array com o index user e em user inserir outro array associativo para id e name

        session([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'admin' => $user->is_admin
            ]
        ]);

        return redirect('/');
    }

    //fazer a função logout da aplicação
    public function logout(){
        session()->forget('user');
        return redirect()->to('/login');
    }
    
}
