<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{
    /*
    >index para mostrar todos los elementos
    >store para guardar un elemento
    >update para actualizarlo
    >destroy para eliminarlo
    >edit para mostrar el formulario de edición
    */ 
    public function store(Request $request){//seria como un INSERT INTO
        $this->validate($request,[//ojo con esta funcion, segun el tutorial era de otra manera y no andaba
            'nombre_usuario'=>'required|min:3',
            'password_usuario'=>'required|min:3'//con | separo las distintas validaciones
        ]);
        $usuarios=Usuario::All()->where('nombre_usuario','=',$request->nombre_usuario);
        if(count($usuarios,COUNT_RECURSIVE)>0){
            return redirect()->route('pag_registro')->with('error_pwd','El usuario '.$request->nombre_usuario.' ya está registrado.');
        }elseif($request->password_usuario==$request->password_usuario2){
            $new_user=new Usuario();
            $new_user->nombre_usuario=$request->nombre_usuario;
            $new_user->password_usuario=$request->password_usuario;
            $new_user->save();
            return redirect()->route('index')->with('success','Usuario creado correctamente.Puede iniciar sesión.');
        }else{
            return redirect()->route('pag_registro')->with('error_pwd','Las contraseñas no coinciden. Intente de vuelta.');
        }

        
    }

    public function check(Request $request){
        $usuario= Usuario::All()->where('nombre_usuario','=',$request->nombre_usuario);
        if(count($usuario,COUNT_RECURSIVE)==0){
            return redirect()->route('index')->with('error','Usuario no registrado.');
        }elseif($usuario->first()->password_usuario!=$request->password_usuario){
            //first() xq por mas q sea un solo resultado, sigue siendo un "array" y no puedo tratarlo como simple objeto
            return redirect()->route('index')->with('error','Contraseña incorrecta.');
        }else{
            $usuario_elegido=$usuario->first()->nombre_usuario;
            return redirect()->route('feed-todos')->with('usuario',$usuario_elegido);
        }
    }
    public function update(Request $request,$id){

    }
    public function show($id){

    }
    public function destroy($id){

    }
}
