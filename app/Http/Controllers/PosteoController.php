<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;

class PosteoController extends Controller
{
    public function store(Request $request){//seria como un INSERT INTO
        if (isset($_POST['upload'])) {
            $filename = $_FILES["upload_file"]["name"];
            $tempname = $_FILES["upload_file"]["tmp_name"];	
            $folder = "C:/Users/H230858/Desktop/New_folder/insta_laravel/imgs/".$filename;
            $new_publi=new Publicacion();
            $new_publi->foto=$filename;
            $new_publi->comentario=$request->comentario;
            $new_publi->usuario=$request->usuario;
            $new_publi->likes=0;
            $new_publi->save();
            if (move_uploaded_file($tempname, $folder)) {
			    $msg = "Image uploaded successfully";
                return redirect()->route('feed-uno',$request->usuario)->with('usuario',$request->usuario);
		    }else{
			    $msg = "Failed to upload image";
                return view('feed',['publis_usuario'=>$publis_usuario,'msg'=>$msg]);
		    }}
    }
    public function index(){
        $lista= Publicacion::all();
        return view ('feed',['lista'=>$lista]);
    }
    public function show($usuario){
        $publis_usuario= Publicacion::All()->where('usuario','=',$usuario);
        return view('feed',['publis_usuario'=>$publis_usuario]);
    }
}
