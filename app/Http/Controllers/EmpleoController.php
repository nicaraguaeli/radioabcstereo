<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleo;
use App\Country;
use App\City;

class EmpleoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        
        $empleos = Empleo::latest()->paginate(25);

        return view('admin.empleos.index',compact('empleos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $countries = Country::all();
        return view('admin.empleos.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
          Request()->validate([
          'pais'=>'required',
          'city_id'=>'required',
          'cargo'=>'required',
          'empleador'=>'required',
          'descripcion' =>'required',
          'expiracion'=> 'required|date',

        ]);
        
        Empleo::create($request->all());

        return redirect('empleo')->with('status','Empleo publicado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        

        $empleo = Empleo::find($id);

        $countries = Country::all();  

        $ciudad = City::join('countries as c','country_id','=','c.id')->select('c.name as pais','cities.name as ciudad', 'c.id as idp', 'cities.id as idc')->where('cities.id',$empleo->city_id)->first();
       
        
        
      
        return view('admin.empleos.edit',compact('countries'),['empleo'=>$empleo,'ciudad'=>$ciudad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           
             Request()->validate([
          'pais'=>'required',
          'city_id'=>'required',
          'cargo'=>'required',
          'empleador'=>'required',
          'descripcion' =>'required',
          'expiracion'=> 'required|date',

        ]);

            $empleo = Empleo::find($id);
            $empleo->cargo = $request->cargo;
            $empleo->empleador = $request->empleador;
            $empleo->descripcion = $request->descripcion;
            $empleo->expiracion = $request->expiracion;
            $empleo->city_id = $request->city_id;      
            $empleo->save();
           

            return redirect('empleo')->with('status','ha sido actualizado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleo = Empleo::find($id)->delete();

        return redirect('empleo')->with('status','ha sido eliminado!');
    }
}
