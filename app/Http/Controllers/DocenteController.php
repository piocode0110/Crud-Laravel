<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //consultar datos
        $datos['docentes']=Docente::paginate(5);
        return view('docente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('docente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Titulo'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La foto requerida'
        ];

        $this->validate($request,$campos,$mensaje);


        //$datosDocente= request()->all();
        $datosDocente= request()->except('_token');

        if($request->hasFile('Foto')){
            $datosDocente['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Docente::insert($datosDocente);
        return redirect('docente')->with('mensaje','Docente agregado con Éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $docente=Docente::findOrFail($id);
        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $campos=[
            'Nombres'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Titulo'=>'required|string|max:100',
            'Correo'=>'required|email',
            

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        if($request->hasFile('Foto')){   
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'La foto requerida'];
        }
        $this->validate($request,$campos,$mensaje);

        //
        $datosDocente= request()->except(['_token', '_method']);

        if($request->hasFile('Foto')){    
            $docente=Docente::findOrFail($id);

            Storage::delete('public/'.$docente->Foto);

            $datosDocente['Foto']=$request->file('Foto')->store('uploads','public');
        }


        Docente::where('id','=',$id)->update($datosDocente);
        $docente=Docente::findOrFail($id);
       // return view('docente.edit', compact('docente'));

        return redirect('docente')->with('mensaje','Docente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $docente=Docente::findOrFail($id);
        if(Storage::delete('public/'.$docente->Foto)){

            Docente::destroy($id);     
        }


        
        return redirect('docente')->with('mensaje','Docente Borrado');
    }
}
