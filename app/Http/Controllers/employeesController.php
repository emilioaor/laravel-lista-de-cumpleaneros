<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\employee;

use Session;

class employeesController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::orderBy('month','ASC')->orderBy('day','ASC')->get();
        return view('admin/employees')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Session::flash('alert-show','SI');
        $errors = $this->formValidation($request);
        if($errors==''){
            //Sin errores agregar empleado
            $employee = new employee($request->all() );
            if($request->file){
                $path = public_path().'/imagesEmployees/';
                $name = $request->name.'.'.$request->file->getClientOriginalExtension();
                $employee->image = $name;
                if( $request->file->move($path,$name) ){
                    $employee->save();
                    Session::flash('alert-msj','Empleado agregado correctamente');
                    Session::flash('alert-type','alert-success');
                }else{
                    Session::flash('alert-msj','Error al subir la imagen');
                    Session::flash('alert-type','alert-danger');
                }

            }else{
                $employee->save();
                Session::flash('alert-msj','Empleado agregado correctamente');
                Session::flash('alert-type','alert-success');
            }
            
        }else{
            //Datos Erróneos Devolver Error
            Session::flash('alert-msj',$errors);
            Session::flash('alert-type','alert-danger');
            if($request->name) Session::flash('error-name',$request->name);
            if($request->month) Session::flash('error-month',$request->month);
            if($request->day) Session::flash('error-day',$request->day);
        }

        return redirect('admin/employees/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        Session::flash('alert-show',$id);
        $errors = $this->formValidation($request);
        if( $errors == '' ){
            //Datos correctos. Registrar

            $employee = employee::find($id);
            $employee->fill($request->all() );

            if($request->file){
                $path = public_path().'/imagesEmployees/';
                $name = $employee->name.'.'.$request->file->getClientOriginalExtension();
                $employee->image = $name;

                if($request->file->move($path,$name) ){
                    Session::flash('alert-msj','Registro actualizado correctamente');
                    Session::flash('alert-type','alert-success');
                    $employee->save();
                }else{
                    Session::flash('alert-msj','Error al subir imagen');
                    Session::flash('alert-type','alert-danger');
                }

            }else{
                Session::flash('alert-msj','Registro actualizado correctamente');
                Session::flash('alert-type','alert-success');
                $employee->save();
            }
            
        }else{
            //Datos Erróneos Devolver Error
            Session::flash('alert-msj',$errors);
            Session::flash('alert-type','alert-danger');
        }

        return redirect('admin/employees');
    }


    public function formValidation(Request $request){

        $errors = '';

        //Validar NOMBRE
        if($request->name == '' ) $errors =  $errors."<br> --> El <strong>NOMBRE</strong> no puede estar vacio.";

        //Validar MES
        if($request->month == '' ) 
            $errors =  $errors."<br> --> El <strong>MES</strong>  no puede estar vacio.";
        elseif( (string) intval($request->month) <> $request->month )
            $errors =  $errors."<br> --> El <strong>MES</strong>  debe ser un número entero.";
        elseif( ( (string) intval($request->month) == $request->month ) && ($request->month <=0 || $request->month >= 13) )
            $errors =  $errors."<br> --> El <strong>MES</strong>  debe estar entre 1 y 12.";

        //Validar DIA
        if($request->day == '' ) 
            $errors =  $errors."<br> --> El <strong>DÍA</strong>  no puede estar vacio.";
        elseif( (string) intval($request->day) <> $request->day )
            $errors =  $errors."<br> --> El <strong>DÍA</strong>  debe ser un número entero.";
        elseif( ( (string) intval($request->day) == $request->day ) && ($request->day <=0 || $request->day >= 32) )
            $errors =  $errors."<br> --> El <strong>DÍA</strong>  debe estar entre 1 y 31.";

        return $errors;
    }
}
