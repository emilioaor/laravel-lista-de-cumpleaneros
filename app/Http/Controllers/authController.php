<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class authController extends Controller
{
    
    public function showLogin(){
    	return view('auth/login');
    }

    public function login(Request $request){
    	
    	$errors = $this->formValidation($request);
    	if($errors==''){
    		if(Auth::attempt(['user' => $request->user, 'password' => $request->password]) )
    			return redirect('admin/employees');
    		else{
    			Session::flash('alert-show','SI');
	    		Session::flash('alert-msj',"<br> --> El <strong>USUARIO</strong> o <strong>CONTRASEÑA</strong> son incorrectas.");
	    		Session::flash('alert-type','alert-danger');

	    		return redirect('auth/login');
    		}
    	}else{
    		Session::flash('alert-show','SI');
    		Session::flash('alert-msj',$errors);
    		Session::flash('alert-type','alert-danger');
    		return redirect('auth/login');
    	}
    }

    public function logout(){
    	Auth::logout();
    	Session::flash('alert-show','SI');
    	Session::flash('alert-msj',"<br> Su sesión ha sido cerrada satisfactoriamente.");
    	Session::flash('alert-type','alert-info');

    	return redirect('auth/login');
    }

    public function formValidation(Request $request){

    	$errors = '';
    	if($request->user == '' ) $errors = $errors . "<br> --> El <strong>USUARIO</strong> no puede estar vacio.";
    	if($request->password == '' ) $errors = $errors . "<br> --> La <strong>CONTRASEÑA</strong> no puede estar vacia.";

    	return $errors;
    }
}
